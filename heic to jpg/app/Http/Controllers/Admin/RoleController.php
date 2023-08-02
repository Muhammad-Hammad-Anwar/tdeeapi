<?php
    
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
    
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:roles-list',  ['only' => ['index']]);
        $this->middleware('permission:roles-view',  ['only' => ['show']]);
        $this->middleware('permission:roles-create',['only' => ['create','store']]);
        $this->middleware('permission:roles-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:roles-delete',['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::get();
        return view('admin.roles.index',compact('roles'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $permissionGroup = [];
        foreach(Permission::get() as $permission){
            $title = explode('-', $permission->name);
            $permissionGroup[$title[0]][] = array('id' => $permission->id, 'name' => $title[1]);
        }
        return view('admin.roles.create',compact('role','permissionGroup'));
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
            'name'          => 'required|unique:roles,name',
            'permission'   => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name'),'guard_name'=>'web']);
        $role->syncPermissions($request->get('permission'));
        return redirect()->route('roles.index')->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permissionGroup = [];
        foreach(Permission::get() as $permission){
            in_array($permission->name, $role->permissions->pluck('name')->toArray()) ? $exist = 'checked' : $exist = '';
            $title = explode('-', $permission->name);
            $permissionGroup[$title[0]][] = array('id' => $permission->id, 'name' => $title[1],'exist' => $exist);
        }
    
        return view('admin.roles.show',compact('role','permissionGroup'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissionGroup = [];
        foreach(Permission::get() as $permission){
            in_array($permission->name, $role->permissions->pluck('name')->toArray()) ? $exist = 'checked' : $exist = '';
            $title = explode('-', $permission->name);
            $permissionGroup[$title[0]][] = array('id' => $permission->id, 'name' => $title[1],'exist' => $exist);
        }
        return view('admin.roles.edit',compact('role','permissionGroup'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id)->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }
}