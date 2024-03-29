<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\Employee\Models\Employee;
use Domain\Position\Models\Position;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $position = Position::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'position_id' => $position->id,
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),
        ];
    }
}
