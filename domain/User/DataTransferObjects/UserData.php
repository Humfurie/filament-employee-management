<?php

declare(strict_types=1);

namespace Domain\User\DataTransferObjects;

final readonly class UserData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
