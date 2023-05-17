<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\Employee\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /** Run the database seeds. */
    public function run(): void
    {
        Employee::factory()->new()->count(50)->create();
    }
}
