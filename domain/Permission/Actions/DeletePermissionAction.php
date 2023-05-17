<?php

declare(strict_types=1);

namespace Domain\Permission\Actions;

use Spatie\Permission\Models\Permission;

class DeletePermissionAction
{
    public function execute(Permission $permission): void
    {
        $permission->delete();
    }
}
