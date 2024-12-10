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
        // Predefined attributes
        $attributes = [
            'New',
            'Used',
            'Rare',
            'First Edition',
            'Signed',
            'Hardcover',
            'Paperback',
            'Limited Edition'
        ];

        // Create predefined attributes
        foreach ($attributes as $attribute) {
            DefaultAttribute::create([
                'attribute_value' => $attribute
            ]);
        }

        // Optionally add some random attributes
        DefaultAttribute::factory(5)->create();
    }
}
