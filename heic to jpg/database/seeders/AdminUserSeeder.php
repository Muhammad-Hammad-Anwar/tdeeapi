<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      	=> 'Super Admin',
            'email'     	=> 'DHRT0623@gmail.com',
            'password'  	=> bcrypt('9HH^@_*TkH%'),
        ]);

        $role = Role::create(['name' => 'Super Admin','guard_name' => 'web']);

        $role->syncPermissions(Permission::all());
        $user->assignRole(1);
    }
}
