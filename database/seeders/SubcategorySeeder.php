<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategorySeeder extends Seeder
{
    public function run(): void
    {
        $subcategories = [
            ['subcategory_name' => 'Science Fiction', 'category_id' => 1],
            ['subcategory_name' => 'Mystery', 'category_id' => 1],
            ['subcategory_name' => 'History', 'category_id' => 2],
            ['subcategory_name' => 'Biography', 'category_id' => 2],
            ['subcategory_name' => 'Computer Science', 'category_id' => 3],
            ['subcategory_name' => 'Mathematics', 'category_id' => 3]
        ];

        foreach ($subcategories as $subcategoryData) {
            Subcategory::create($subcategoryData);
        }
    }
}