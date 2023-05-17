<?php

declare(strict_types=1);

namespace App\Policies;

use Domain\Employee\Models\Employee;
use Domain\User\Models\User;

class EmployeePolicy
{
    /** Determine whether the user can view any models. */
    public function viewAny(User $user): bool
    {
        return $user->can('employee_viewAny');
    }

    /** Determine whether the user can view the model. */
    public function view(User $user, Employee $employee): bool
    {
        return $user->can('employee_view');
    }

    /** Determine whether the user can create models. */
    public function create(User $user): bool
    {
        return $user->can('employee_create');
    }

    /** Determine whether the user can update the model. */
    public function update(User $user, Employee $employee): bool
    {
        return $user->can('employee_update');
    }

    /** Determine whether the user can delete the model. */
    public function delete(User $user, Employee $employee): bool
    {
        return $user->can('employee_delete');
    }

    /** Determine whether the user can restore the model. */
    public function restore(User $user, Employee $employee): bool
    {
        return $user->can('employee_restore');
    }

    /** Determine whether the user can permanently delete the model. */
    public function forceDelete(User $user, Employee $employee): bool
    {
        return $user->can('employee_forceDelete');
    }
}
