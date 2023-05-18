<?php

declare(strict_types=1);

namespace Domain\Employee\DataTransferObjects;

final readonly class EmployeeData
{
    public function __construct(
        public int $user_id,
        public int $position_id,
        public string $first_name,
        public string $middle_name,
        public string $last_name
    ) {
    }
}
