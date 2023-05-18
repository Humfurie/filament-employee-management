<?php

declare(strict_types=1);

namespace Domain\Employee\Actions;

use Domain\Employee\Models\Employee;

class RestoreEmployeeAction
{
    public function execute(Employee $employee): void
    {
        $employee->restore();
    }
}