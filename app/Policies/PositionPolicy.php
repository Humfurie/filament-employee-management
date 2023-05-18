<?php

declare(strict_types=1);

namespace App\Policies;

use App\Policies\Concerns\ChecksWildcardPermissions;
use Domain\Position\Models\Position;
use Domain\User\Models\User;

class PositionPolicy
{
    use ChecksWildcardPermissions;

    /** Determine whether the user can view any models. */
    public function viewAny(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can view the model. */
    public function view(User $user, Position $position): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can create models. */
    public function create(User $user): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can update the model. */
    public function update(User $user, Position $position): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can delete the model. */
    public function delete(User $user, Position $position): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can restore the model. */
    public function restore(User $user, Position $position): bool
    {
        return $this->checkWildcardPermissions($user);
    }

    /** Determine whether the user can permanently delete the model. */
    public function forceDelete(User $user, Position $position): bool
    {
        return $this->checkWildcardPermissions($user);
    }
}
