<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{

    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $developer = Role::create(['name' => 'developer']);


        //permisos para users
        Permission::create(['name' => 'users']);

        //permisos perfiles
        Permission::create(['name' => 'profiles']);

        //permisos products
        Permission::create(['name' => 'products'])->syncRoles([$admin, $manager, $developer]);
        Permission::create(['name' => 'products.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'products.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'products.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'products.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'products.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'products.destroy'])->syncRoles([$admin]);


    }
}
