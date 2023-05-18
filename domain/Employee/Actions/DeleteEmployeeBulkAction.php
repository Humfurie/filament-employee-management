<?php

namespace Domain\Employee\Actions;

use Domain\Employee\Models\Employee;

class DeleteEmployeeBulkAction
{
    public function execute(Employee $employee): void
    {
        $employee->delete();
    }
}
