<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Fiction'],
            ['category_name' => 'Non-Fiction'],
            ['category_name' => 'Academic']
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}