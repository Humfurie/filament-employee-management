<?php

declare(strict_types=1);

namespace Domain\Role\DataTransferObjects;

final readonly class RoleData
{
    public function __construct(
        public string $name
    ) {
    }
}
