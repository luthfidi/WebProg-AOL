<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition()
    {
        // Ensure we have a user with role 0 or 1
        $user = User::where('role', '<=', 1)->inRandomOrder()->first()
            ?? User::factory()->state(['role' => $this->faker->randomElement([0, 1])])->create();

        return [
            'store_name' => $this->faker->unique()->company(),
            'details' => $this->faker->paragraph(),
            'user_id' => $user->id
        ];
    }
}
