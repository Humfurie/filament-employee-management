<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\User\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /** Run the database seeds. */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Humfurie',
            'email' => 'Humfurie@gmail.com',
            'password' => 'Humfurie',
        ]);

        $user->assignRole('admin');
    }
}
