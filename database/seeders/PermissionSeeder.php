<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\PermissionFactory;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /** Run the database seeds. */
    public function run(): void
    {
        $permissions = [
            'admin',
            'admin.viewAny',
            'admin.view',
            'admin.create',
            'admin.update',
            'admin.delete',
            'admin.restore',
            'admin.forceDelete',
            'role',
            'role.viewAny',
            'role.view',
            'role.create',
            'role.update',
            'role.delete',
            'role.restore',
            'role.forceDelete',
            'user',
            'user.viewAny',
            'user.view',
            'user.create',
            'user.update',
            'user.delete',
            'user.restore',
            'user.forceDelete',
            'employee',
            'employee.viewAny',
            'employee.view',
            'employee.create',
            'employee.update',
            'employee.delete',
            'employee.restore',
            'employee.forceDelete',
            'employee.restoreBulkAction',
            'employee.deleteBulkAction',
            'employee.forceDeleteBulkAction',
            'position',
            'position.viewAny',
            'position.view',
            'position.create',
            'position.update',
            'position.delete',
            'position.restore',
            'position.forceDelete',
        ];
        foreach($permissions as $permission) {
            PermissionFactory::new()->create(['name' => $permission]);
        }
    }
}
