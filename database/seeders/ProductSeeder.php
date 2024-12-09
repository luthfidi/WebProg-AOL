<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'product_name' => 'Dune',
                'description' => 'Classic science fiction novel by Frank Herbert',
                'sku' => 'BOOK-SF-001',
                'librarian_id' => 1,
                'category_id' => 1,
                'subcategory_id' => 1,
                'store_id' => 1,
                'regular_price' => 25,
                'discounted_price' => 20,
                'tax_rate' => 0.08,
                'stock_quantity' => 100,
                'stock_status' => 'In Stock',
                'slug' => Str::slug('Dune'),
                'visibility' => true,
                'meta_title' => 'Dune - Science Fiction Classic',
                'meta_description' => 'Iconic science fiction novel by Frank Herbert',
                'status' => 'Published'
            ],
            [
                'product_name' => 'Clean Code',
                'description' => 'Fundamental book for software development',
                'sku' => 'BOOK-CS-001',
                'librarian_id' => 1,
                'category_id' => 3,
                'subcategory_id' => 5,
                'store_id' => 2,
                'regular_price' => 45,
                'discounted_price' => 35,
                'tax_rate' => 0.08,
                'stock_quantity' => 50,
                'stock_status' => 'In Stock',
                'slug' => Str::slug('Clean Code'),
                'visibility' => true,
                'meta_title' => 'Clean Code - Software Development',
                'meta_description' => 'Essential book for writing high-quality code',
                'status' => 'Published'
            ]
        ];

        foreach ($books as $bookData) {
            Product::create($bookData);
        }
    }
}
