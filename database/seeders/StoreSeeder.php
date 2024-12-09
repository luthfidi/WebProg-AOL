<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        $stores = [
            [
                'store_name' => 'Central City Library',
                'slug' => Str::slug('Central City Library'),
                'details' => 'Main public library with extensive collection',
                'user_id' => 1
            ],
            [
                'store_name' => 'University Research Library',
                'slug' => Str::slug('University Research Library'),
                'details' => 'Specialized academic research library',
                'user_id' => 1
            ],
            [
                'store_name' => 'City Community Library',
                'slug' => Str::slug('City Community Library'),
                'details' => 'Neighborhood library serving local community',
                'user_id' => 1
            ],
            [
                'store_name' => 'Digital Book Hub',
                'slug' => Str::slug('Digital Book Hub'),
                'details' => 'Online library with digital resources',
                'user_id' => 1
            ]
        ];

        foreach ($stores as $storeData) {
            Store::create($storeData);
        }
    }
}