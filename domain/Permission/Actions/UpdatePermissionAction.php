<?php

namespace Domain\Permission\Actions;

use Domain\Permission\DataTransferObjects\PermissionData;
use Spatie\Permission\Models\Permission;

class UpdatePermissionAction
{
    public function execute(Permission $permission, PermissionData $permissionData): Permission
    {
        $permission->update([
            'name' => $permissionData->name
        ]);

        return $permission;
    }
}
