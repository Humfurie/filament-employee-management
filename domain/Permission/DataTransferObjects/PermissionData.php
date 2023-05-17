<?php

declare(strict_types=1);

namespace Domain\Permission\DataTransferObjects;

final readonly class PermissionData
{
    public function __construct(
        public string $name
    ) {
    }
}
