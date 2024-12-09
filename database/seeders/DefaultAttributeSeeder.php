<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DefaultAttribute;

class DefaultAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            ['attribute_value' => 'Hardcover'],
            ['attribute_value' => 'Paperback'],
            ['attribute_value' => 'E-book'],
        ];

        foreach ($attributes as $attribute) {
            DefaultAttribute::create($attribute);
        }
    }
}