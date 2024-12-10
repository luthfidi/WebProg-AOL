<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class CategoriesSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 categories, each with 3-5 subcategories
        Category::factory(5)->create()->each(function ($category) {
            Subcategory::factory(rand(3, 5))->create([
                'category_id' => $category->id
            ]);
        });

        // Alternatively, for more controlled seeding:
        $libraryCategories = [
            'Fiction' => [
                'Novels',
                'Short Stories',
                'Science Fiction',
                'Fantasy'
            ],
            'Non-Fiction' => [
                'Biography',
                'History',
                'Science',
                'Philosophy'
            ],
            'Reference' => [
                'Dictionaries',
                'Encyclopedias',
                'Atlases'
            ],
            'Children' => [
                'Picture Books',
                'Chapter Books',
                'Educational'
            ],
            'Academic' => [
                'Textbooks',
                'Research Papers',
                'Academic Journals'
            ]
        ];

        foreach ($libraryCategories as $categoryName => $subcategories) {
            $category = Category::create(['category_name' => $categoryName]);

            foreach ($subcategories as $subcategoryName) {
                Subcategory::create([
                    'category_id' => $category->id,
                    'subcategory_name' => $subcategoryName
                ]);
        }
    }
}
}
