<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Store;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have some base data
        $this->ensureBaseData();

        // Create random products
        Product::factory(10)->create();
    }

    /**
     * Ensure base data exists
     */
    private function ensureBaseData()
    {
        // Ensure at least one user with role 0 or 1 exists
        if (!User::where('role', '<=', 1)->exists()) {
            User::factory()->state(['role' => 0])->create();
        }

        // Ensure some categories exist
        if (Category::count() < 3) {
            $defaultCategories = ['Fiction', 'Non-Fiction', 'Academic'];
            foreach ($defaultCategories as $categoryName) {
                $category = Category::firstOrCreate(['category_name' => $categoryName]);

                // Create some subcategories
                $subcategories = match($categoryName) {
                    'Fiction' => ['Novels', 'Short Stories', 'Fantasy'],
                    'Non-Fiction' => ['Biography', 'History', 'Science'],
                    'Academic' => ['Textbooks', 'Research Papers']
                };

                foreach ($subcategories as $subcategoryName) {
                    Subcategory::firstOrCreate([
                        'subcategory_name' => $subcategoryName,
                        'category_id' => $category->id
                    ]);
                }
            }
        }
    }
}