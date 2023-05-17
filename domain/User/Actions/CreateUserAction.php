<?php

declare(strict_types=1);

namespace Domain\User\Actions;

use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;

class CreateUserAction
{
    public function execute(UserData $userData): User
    {
        return User::create([
            'name' => $userData->name,
            'email' => $userData->email,
            'password' => $userData->password,
        ]);
    }
}
