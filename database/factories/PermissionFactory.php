<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Permission;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
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
            'position',
            'position.viewAny',
            'position.view',
            'position.create',
            'position.update',
            'position.delete',
            'position.restore',
            'position.forceDelete',
        ];

        foreach ($permissions as $permission) {
            return [
                'name' => $permission,
            ];
        }
    }
}
