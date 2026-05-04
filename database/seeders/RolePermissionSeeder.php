<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $roles = [
            'superadmin',
            'admin',
            'finance',
            'driver',
            'spv',

        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }



        $permissions = [
            'manage user',
            'manage master data',

            'create driver',
            'edit driver',
            'delete driver',

            'create job orders',
            'edit job orders',
            'delete job orders',

            'create ritases',
            'edit ritases',
            'delete ritases',

            'generate wage claims',
            'approve wage claims',

            'create wage claims',
            'edit wage claims',
            'delete wage claims',

            'create payments',
            'edit payments',
            'delete payments',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        Role::findByName('superadmin')->givePermissionTo(Permission::all()); //superadmin menguasai sistem (kalau nanti mau diadakan )

        Role::findByName('admin')->givePermissionTo([
            Permission::all()
        ]);

        Role::findByName('finance')->givePermissionTo([

            'create payments',
            'edit payments',
            'delete payments',
        ]);

        Role::findByName('spv')->givePermissionTo([

        ]);
    }
}
