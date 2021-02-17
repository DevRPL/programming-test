<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\User;
use DB;
use Hash;

class MasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = ['roles', 'permissions', 'users', 'settings'];
        $permissions = ['display', 'create', 'read', 'update', 'delete'];
        User::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@test.test',
            'password' => Hash::make('123qweasd')
        ]);
        DB::Table('roles')->insert([
            'name' => 'Super Admin',
            'guard_name' => 'web',
            'level' => 1,
            'created_at' =>  now(), 
            'updated_at' =>  now()
        ]);
        foreach ($menus as $menu) {
            $menu_id = DB::Table('menus')->insertGetId([
                'name' => ucwords($menu),
                'created_at' => now(), 
                'updated_at' => now()
            ]);
            foreach ($permissions as $permission) {
                $permission_id = DB::Table('permissions')->insertGetId([
                    'name' => \Str::slug(ucwords($menu)) . '-' . $permission,
                    'guard_name' => 'web',
                    'menu_id' => $menu_id, 
                    'created_at' => now(), 
                    'updated_at' => now()
                ]);
                DB::Table('role_has_permissions')->insert([
                    'permission_id' => $permission_id,
                    'role_id' => 1
                ]);
            }
        }

        DB::Table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Entities\User',
            'model_id' => 1
        ]);
    }
}
