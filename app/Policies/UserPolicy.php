<?php

declare(strict_types=1);

namespace App\Policies;

use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /** Determine whether the user can view any models. */
    public function viewAny(User $user): bool
    {
        return $user->can('user_viewAny');
    }

    /** Determine whether the user can view the model. */
    public function view(User $user, user $model): bool
    {
        return $user->can('user_view');
    }

    /** Determine whether the user can create models. */
    public function create(User $user): bool
    {
        return $user->can('user_create');
    }

    /** Determine whether the user can update the model. */
    public function update(User $user, user $model): bool
    {
        return $user->can('user_update');
    }

    /** Determine whether the user can delete the model. */
    public function delete(User $user, user $model): bool
    {
        return $user->can('user_delete');
    }

    /** Determine whether the user can restore the model. */
    public function restore(User $user, user $model): bool
    {
        return $user->can('user_restore');
    }

    /** Determine whether the user can permanently delete the model. */
    public function forceDelete(User $user, user $model): bool
    {
        return $user->can('user_forceDelete');
    }
}
