<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\EmployeeFactory;
use Database\Factories\PositionFactory;
use Domain\Position\Models\Position;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /** Run the database seeds. */
    public function run(): void
    {
        EmployeeFactory::new()->count(50)->create();
    }
}
