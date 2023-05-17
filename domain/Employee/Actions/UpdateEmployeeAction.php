<?php

namespace Domain\Employee\Actions;

use Domain\Employee\DataTransferObjects\EmployeeData;
use Domain\Employee\Models\Employee;

class UpdateEmployeeAction
{
    public function execute(Employee $employee, EmployeeData $employeeData): Employee
    {
        $employee->update([
            'position_id' => $employeeData->position_id,
            'first_name' => $employeeData->first_name,
            'middle_name' => $employeeData->middle_name,
            'last_name' => $employeeData->last_name,
        ]);

        return $employee;
    }
}
