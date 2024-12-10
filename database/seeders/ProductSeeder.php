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

        // Predefined book products
        $predefinedProducts = [
            [
                'product_name' => 'Classic Literature Collection',
                'description' => 'A curated collection of timeless literary masterpieces.',
                'category' => 'Fiction',
                'subcategory' => 'Novels',
                'regular_price' => 5999,
                'stock_quantity' => 50
            ],
            [
                'product_name' => 'Modern Science Textbook Bundle',
                'description' => 'Comprehensive science textbooks for advanced learners.',
                'category' => 'Academic',
                'subcategory' => 'Textbooks',
                'regular_price' => 7999,
                'stock_quantity' => 30
            ],
            [
                'product_name' => 'Children\'s Illustrated Storybook Set',
                'description' => 'Engaging and colorful storybooks for young readers.',
                'category' => 'Children',
                'subcategory' => 'Picture Books',
                'regular_price' => 3999,
                'stock_quantity' => 100
            ]
        ];

        // Get an admin or librarian user
        $librarian = User::where('role', '<=', 1)->first()
            ?? User::factory()->state(['role' => 0])->create();

        foreach ($predefinedProducts as $productData) {
            // Find or create category and subcategory
            $category = Category::firstOrCreate(['category_name' => $productData['category']]);
            $subcategory = Subcategory::firstOrCreate([
                'subcategory_name' => $productData['subcategory'],
                'category_id' => $category->id
            ]);

            // Find or create a store
            $store = Store::firstOrCreate([
                'store_name' => 'Main Library Store',
                'user_id' => $librarian->id,
                'details' => 'Primary store for library products'
            ]);

            // Create the product
            $product = Product::create([
                'product_name' => $productData['product_name'],
                'description' => $productData['description'],
                'sku' => strtoupper(substr(md5(uniqid()), 0, 10)),
                'librarian_id' => $librarian->id,
                'category_id' => $category->id,
                'subcategory_id' => $subcategory->id,
                'store_id' => $store->id,
                'regular_price' => $productData['regular_price'],
                'stock_quantity' => $productData['stock_quantity'],
                'stock_status' => $productData['stock_quantity'] > 0 ? 'In Stock' : 'Out of Stock',
                'slug' => \Illuminate\Support\Str::slug($productData['product_name']),
                'visibility' => true,
                'status' => 'Published'
            ]);
        }

        // Create additional random products
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
