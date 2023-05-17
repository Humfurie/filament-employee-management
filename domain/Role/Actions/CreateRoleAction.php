<?php

declare(strict_types=1);

namespace Domain\Role\Actions;

use Domain\Role\DataTransferObjects\RoleData;
use Spatie\Permission\Models\Role;

class CreateRoleAction
{
    public function execute(RoleData $roleData): Role
    {
        return Role::create([
            'name' => $roleData->name,
        ]);
    }
}
