<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [
                'product_id' => 1,
                'img_path' => 'dune-book.jpg',
                'is_primary' => true
            ],
            [
                'product_id' => 2,
                'img_path' => 'clean-code-book.jpg',
                'is_primary' => true
            ]
        ];

        foreach ($images as $imageData) {
            ProductImage::create($imageData);
        }
    }
}