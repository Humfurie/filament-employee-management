<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /** Run the database seeds. */
    public function run(): void
    {
        Permission::factory()->create();
    }
}
