<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Domain\User\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'Humphrey Singculan',
            'email' => 'Humfurie@gmail.com',
            'password' => 'Humfurie'
        ]);

        $role = Role::create(
            ['name' => 'Admin'],
        );

        $permissions = [
            'admin',
            'admin_viewAny',
            'admin_view',
            'admin_create',
            'admin_update',
            'admin_delete',
            'admin_restore',
            'admin_forceDelete',
            'role',
            'role_viewAny',
            'role_view',
            'role_create',
            'role_update',
            'role_delete',
            'role_restore',
            'role_forceDelete',
            'user',
            'user_viewAny',
            'user_view',
            'user_create',
            'user_update',
            'user_delete',
            'user_restore',
            'user_forceDelete',
            'employee',
            'employee_viewAny',
            'employee_view',
            'employee_create',
            'employee_update',
            'employee_delete',
            'employee_restore',
            'employee_forceDelete',
            'position',
            'position_viewAny',
            'position_view',
            'position_create',
            'position_update',
            'position_delete',
            'position_restore',
            'position_forceDelete',
        ];

        foreach($permissions as $permission)
        {
            $assignPermission = Permission::create([
                'name' => $permission
            ]);

            $role->givePermissionTo([$assignPermission]);
        }

        $user->assignRole('Admin');
    }
}
