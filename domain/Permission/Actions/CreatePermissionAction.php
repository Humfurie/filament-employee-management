<?php

namespace Domain\Permission\Actions;

use Domain\Permission\DataTransferObjects\PermissionData;
use Spatie\Permission\Models\Permission;

class CreatePermissionAction
{
    public function execute(PermissionData $permissionData): Permission
    {
        return Permission::create([
            'name' => $permissionData->name
        ]);
    }
}
