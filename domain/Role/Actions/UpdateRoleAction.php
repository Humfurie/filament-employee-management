<?php

declare(strict_types=1);

namespace Domain\Role\Actions;

use Domain\Role\DataTransferObjects\RoleData;
use Spatie\Permission\Models\Role;

class UpdateRoleAction
{
    public function execute(Role $role, RoleData $roleData): Role
    {
        $role->update([
            'name' => $roleData->name,
        ]);

        return $role;
    }
}
