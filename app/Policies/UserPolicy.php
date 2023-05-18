<?php

declare(strict_types=1);

namespace App\Policies;

use App\Policies\Concerns\ChecksWildcardPermissions;
use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    use ChecksWildcardPermissions;

    public function before(?User $user, string $ability): bool|null
    {
        if ($user && $user->isAdmin()) {
            return true;
        }

        return null;
    }

    /** Determine whether the user can view any models. */
    public function viewAny(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can view the model. */
    public function view(User $user, user $model): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can create models. */
    public function create(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can update the model. */
    public function update(User $user, user $model): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can delete the model. */
    public function delete(User $user, user $model): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can restore the model. */
    public function restore(User $user, user $model): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can permanently delete the model. */
    public function forceDelete(User $user, user $model): bool
    {
        return $this->checkWildcardPermissions($user);
    }
}
