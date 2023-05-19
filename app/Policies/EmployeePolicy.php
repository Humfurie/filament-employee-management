<?php

declare(strict_types=1);

namespace App\Policies;

use App\Policies\Concerns\ChecksWildcardPermissions;
use Domain\Employee\Models\Employee;
use Domain\User\Models\User;

class EmployeePolicy
{
    use ChecksWildcardPermissions;

    /** Determine whether the user can view any models. */
    public function viewAny(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
        // return dd(config('domain.role.super_admin'));
    }

    /** Determine whether the user can view the model. */
    public function view(User $user, Employee $employee): bool
    {
        return $this->checkWildcardPermissions($user) && $user->id === $employee->user_id;
    }

    /** Determine whether the user can create models. */
    public function create(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can update the model. */
    public function update(User $user, Employee $employee): bool
    {
        return $this->checkWildcardPermissions($user) && $user->id === $employee->user_id;
    }

    /** Determine whether the user can delete the model. */
    public function delete(User $user, Employee $employee): bool
    {
        return $this->checkWildcardPermissions($user) && $user->id === $employee->user_id;
    }

    /** Determine whether the user can restore the model. */
    public function restore(User $user, Employee $employee): bool
    {
        return $this->checkWildcardPermissions($user) && $user->id === $employee->user_id;
    }

    /** Determine whether the user can permanently delete the model. */
    public function forceDelete(User $user, Employee $employee): bool
    {
        return $this->checkWildcardPermissions($user) && $user->id === $employee->user_id;
    }

    public function deleteBulkAction(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
        // return false;
    }

    public function restoreBulkAction(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    public function forceDeleteBulkAction(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
    }
}
