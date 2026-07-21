<?php

namespace Database\Seeders;

use App\Models\LicenseKey;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@keysbeast.test',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Demo Customer',
            'email' => 'customer@keysbeast.test',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        $products = [
            [
                'name' => 'Windows 11 Pro',
                'type' => 'windows',
                'price' => 19.99,
                'description' => 'Genuine Windows 11 Pro retail license key, valid for one PC.',
            ],
            [
                'name' => 'Microsoft Office 2021 Professional',
                'type' => 'office',
                'price' => 29.99,
                'description' => 'Lifetime license for Word, Excel, PowerPoint, Outlook and more.',
            ],
            [
                'name' => 'Cyber Quest: Legends (PC)',
                'type' => 'game',
                'price' => 14.50,
                'description' => 'Steam key for Cyber Quest: Legends — open-world action RPG.',
            ],
        ];

        foreach ($products as $data) {
            $product = Product::create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'description' => $data['description'],
                'price' => $data['price'],
                'type' => $data['type'],
                'is_active' => true,
            ]);

            // A handful of available keys, ready for purchase.
            LicenseKey::factory()
                ->count(5)
                ->for($product)
                ->create(['status' => 'available']);

            // A couple of already-sold keys, so the admin panel isn't empty.
            LicenseKey::factory()
                ->count(2)
                ->for($product)
                ->create(['status' => 'used', 'assigned_at' => now()]);
        }
    }
}
