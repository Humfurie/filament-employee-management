<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\PositionFactory;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /** Run the database seeds. */
    public function run(): void
    {
        PositionFactory::new()->count(10)->create();
    }
}
