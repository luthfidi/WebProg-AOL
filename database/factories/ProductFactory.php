<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Store;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $productName = $this->faker->unique()->sentence(3);
        $regularPrice = $this->faker->numberBetween(100, 10000);
        $discountedPrice = $this->faker->boolean(30)
            ? $this->faker->numberBetween(50, $regularPrice)
            : null;

        // Ensure we have related models
        $librarian = User::where('role', '<=', 1)->inRandomOrder()->first()
            ?? User::factory()->state(['role' => $this->faker->randomElement([0, 1])])->create();

        $category = Category::inRandomOrder()->first() ?? Category::factory()->create();
        $subcategory = Subcategory::where('category_id', $category->id)->inRandomOrder()->first()
            ?? Subcategory::factory()->create(['category_id' => $category->id]);

        $store = Store::inRandomOrder()->first() ?? Store::factory()->create();

        return [
            'product_name' => $productName,
            'description' => $this->faker->paragraph(),
            'sku' => strtoupper(Str::random(10)),
            'librarian_id' => $librarian->id,
            'category_id' => $category->id,
            'subcategory_id' => $subcategory->id,
            'store_id' => $store->id,
            'regular_price' => $regularPrice,
            'discounted_price' => $discountedPrice,
            'tax_rate' => $this->faker->randomFloat(2, 0, 0.2),
            'stock_quantity' => $this->faker->numberBetween(0, 500),
            'stock_status' => $this->faker->randomElement(['In Stock', 'Out of Stock']),
            'slug' => Str::slug($productName),
            'visibility' => $this->faker->boolean(),
            'meta_title' => $this->faker->sentence(),
            'meta_description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['Draft', 'Published'])
        ];
    }

    /**
     * Configure the factory to add product images after creation
     */
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // Create 3-6 images for each product
            $imageCount = $this->faker->numberBetween(3, 6);

            ProductImage::factory($imageCount)
                ->create([
                    'product_id' => $product->id,
                    // Ensure only one primary image
                    'is_primary' => false
                ]);

            // Set one image as primary
            ProductImage::where('product_id', $product->id)
                ->inRandomOrder()
                ->first()
                ->update(['is_primary' => true]);
        });
    }
}
