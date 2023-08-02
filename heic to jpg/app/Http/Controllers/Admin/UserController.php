<?php
    
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
    
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;
use Illuminate\Support\Arr;
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:users-list',  ['only' => ['index']]);
        $this->middleware('permission:users-view',  ['only' => ['show']]);
        $this->middleware('permission:users-create',['only' => ['create','store']]);
        $this->middleware('permission:users-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:users-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::get();
        return view('admin.users.index',compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.create',compact('roles','user'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|same:confirm_password',
            'confirm_password'  => 'required|same:password',
            'roles'             => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','id')->all();
        $userRole = $user->roles->pluck('name','id')->all();
    
        return view('admin.users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileedit()
    {
        return view('admin.users.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email,' . Auth::user()->id,
            'old_password'      => 'nullable|required_with:new_password',
            'new_password'      => 'nullable|min:8|max:12',
            'confirm_password'  => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);

        $input = $request->all();

        if (!empty($input['new_password'])) {
            $input['password'] = Hash::make($input['new_password']);
        }else {
            $input = Arr::except($input, array('password'));
        }
        if($image = $request->file('image')){
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move('upload/images/profile/', $filename);
            $name = "upload/images/profile/".$filename;
            $input['image'] = $name;
        }
        else{
            unset($input['image']);
        }
        Auth()->user()->update($input);
        
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkEmail(Request $request)
    {
        if ($request->id) {
            $user = User::where('id','!=',$request->id)->where('email', $request->email)->first(); 
        }else{
            $user = User::where('email', $request->email)->first();
        }

        if($user){ echo "false"; }else{ echo "true";}
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkPassword(Request $request)
    {
        $user = User::find($request->id);
        if(!Hash::check($request->old_password, $user->password)) { echo "false"; }else{ echo "true";}
    }
}