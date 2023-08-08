<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fname' => fake()->firstname(),
            'lname' => fake()->lastname(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'age' => fake()->numberBetween($min = 18, $max = 60),
            'email' => fake()->unique()->safeEmail(),

        ];
    }
}
