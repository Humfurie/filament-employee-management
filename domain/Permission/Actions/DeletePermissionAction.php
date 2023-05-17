<?php

namespace Domain\Permission\Actions;

use Spatie\Permission\Models\Permission;

class DeletePermissionAction
{
    public function execute(Permission $permission): void
    {
        $permission->delete();
    }
}
