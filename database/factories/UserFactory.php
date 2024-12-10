<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'role' => $this->faker->randomElement([0,1, 2]), // Adjust roles as needed
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Default password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the user is an admin.
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 0,
                'name' => 'Admin User'
            ];
        });
    }

    /**
     * Indicate that the user is a regular user.
     */
    public function regularUser()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 2,
                'name' => 'Regular User'
            ];
        });
    }
}
