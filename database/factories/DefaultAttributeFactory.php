<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DefaultAttribute;

class DefaultAttributeFactory extends Factory
{
    protected $model = DefaultAttribute::class;

    public function definition()
    {
        return [
            'attribute_value' => $this->faker->unique()->word()
        ];
    }
}
