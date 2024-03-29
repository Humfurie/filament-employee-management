<?php

declare(strict_types=1);

namespace App\Policies;

use App\Policies\Concerns\ChecksWildcardPermissions;
use Domain\User\Models\User;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use ChecksWildcardPermissions;

    /** Determine whether the user can view any models. */
    public function viewAny(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can view the model. */
    public function view(User $user, Role $role): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can create models. */
    public function create(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can update the model. */
    public function update(User $user, Role $role): bool
    {
        return $this->checkWildcardPermissions($user) && $role->name != config('domain.role.super_admin');
    }

    /** Determine whether the user can delete the model. */
    public function delete(User $user, Role $role): bool
    {
        return $this->checkWildcardPermissions($user) && $role->name != config('domain.role.super_admin');
    }

    /** Determine whether the user can restore the model. */
    public function restore(User $user, Role $role): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can permanently delete the model. */
    public function forceDelete(User $user, Role $role): bool
    {
        return $this->checkWildcardPermissions($user) && $role->name != config('domain.role.super_admin');
    }

    // public function deleteBulkAction(User $user, Role $role): bool
    // {
    //     return $this->checkWildcardPermissions($user) && $role->name != config('domain.role.super_admin');
    // }

    // public function restoreBulkAction(User $user, Role $role): bool
    // {
    //     return $this->checkWildcardPermissions($user) && $role->name != config('domain.role.super_admin');
    // }

    // public function forceDeleteBulkAction(User $user, Role $role): bool
    // {
    //     return $this->checkWildcardPermissions($user) && $role->name != config('domain.role.super_admin');
    // }
}
