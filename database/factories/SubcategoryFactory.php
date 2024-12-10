<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subcategory>
 */
class SubcategoryFactory extends Factory
{
    protected $model = Subcategory::class;

    public function definition()
    {
        return [
            'subcategory_name' => $this->faker->unique()->word(),
            'category_id' => Category::factory()
        ];
    }
}
