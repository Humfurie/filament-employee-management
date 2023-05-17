<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Domain\User\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /** Seed the application's database. */
    public function run(): void
    {

        // $user = User::create([
        //     'name' => 'Humphrey Singculan',
        //     'email' => 'Humfurie@gmail.com',
        //     'password' => 'Humfurie',
        // ]);

        // $role = Role::create(
        //     ['name' => 'Admin'],
        // );

        // $permissions = [
        //     'admin',
        //     'admin.viewAny',
        //     'admin.view',
        //     'admin.create',
        //     'admin.update',
        //     'admin.delete',
        //     'admin.restore',
        //     'admin.forceDelete',
        //     'role',
        //     'role.viewAny',
        //     'role.view',
        //     'role.create',
        //     'role.update',
        //     'role.delete',
        //     'role.restore',
        //     'role.forceDelete',
        //     'user',
        //     'user.viewAny',
        //     'user.view',
        //     'user.create',
        //     'user.update',
        //     'user.delete',
        //     'user.restore',
        //     'user.forceDelete',
        //     'employee',
        //     'employee.viewAny',
        //     'employee.view',
        //     'employee.create',
        //     'employee.update',
        //     'employee.delete',
        //     'employee.restore',
        //     'employee.forceDelete',
        //     'position',
        //     'position.viewAny',
        //     'position.view',
        //     'position.create',
        //     'position.update',
        //     'position.delete',
        //     'position.restore',
        //     'position.forceDelete',
        // ];

        // foreach ($permissions as $permission) {
        //     $assignPermission = Permission::create([
        //         'name' => $permission,
        //     ]);

        //     $role->givePermissionTo([$assignPermission]);
        // }

        // $user->assignRole('Admin');

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PositionSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
