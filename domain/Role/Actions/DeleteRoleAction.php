<?php

declare(strict_types=1);

namespace Domain\Role\Actions;

use Spatie\Permission\Models\Role;

class DeleteRoleAction
{
    public function execute(Role $role): ?bool
    {
        if ($role->name === 'Admin') {

        }

        return $role->delete();
    }
}
