<?php

namespace Domain\User\Actions;

use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;

class UpdateUserAction
{
    public function execute(User $user, UserData $userData): User
    {
        $user->update([
            'name' => $userData->name,
            'email' => $userData->email,
        ]);

        return $user;
    }
}
