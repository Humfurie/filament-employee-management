<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Domain\User\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /** Run the database seeds. */
    public function run(): void
    {
        // $user = User::create([
        //     'name' => 'Humfurie',
        //     'email' => 'Humfurie@gmail.com',
        //     'password' => 'Humfurie',
        // ]);

        $user = UserFactory::new([
            'name' => 'Humfurie',
            'email' => 'Humfurie@gmail.com',
            'password' => 'Humfurie',
        ])->create();

        $user->assignRole(config('domain.role.super_admin'));
    }
}
