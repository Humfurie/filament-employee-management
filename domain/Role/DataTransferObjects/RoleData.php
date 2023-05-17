<?php

namespace Domain\Role\DataTransferObjects;

final readonly class RoleData
{
    public function __construct(
        public string $name
    ) {
    }
}
