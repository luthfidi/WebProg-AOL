<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Predefined stores
        $predefinedStores = [
            [
                'store_name' => 'Main Library Store',
                'details' => 'Our primary library store with a wide collection of books and resources.'
            ],
            [
                'store_name' => 'Academic Resources Store',
                'details' => 'Specialized store for academic and research materials.'
            ],
            [
                'store_name' => 'Children\'s Library Store',
                'details' => 'A dedicated store for children\'s books and educational resources.'
            ]
        ];

        // Get an admin or librarian user
        $adminUser = User::where('role', '<=', 1)->first();

        if (!$adminUser) {
            // Create an admin user if none exists
            $adminUser = User::factory()->state(['role' => 0])->create();
        }

        // Create predefined stores
        foreach ($predefinedStores as $storeData) {
            Store::create([
                'store_name' => $storeData['store_name'],
                'details' => $storeData['details'],
                'slug' => Str::slug($storeData['store_name']), // Explicitly create slug
                'user_id' => $adminUser->id
            ]);
        }

        // Create additional random stores
        Store::factory(5)->create();
    }
}
