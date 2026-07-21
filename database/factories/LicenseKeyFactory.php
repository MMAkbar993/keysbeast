<?php

namespace Database\Factories;

use App\Models\LicenseKey;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LicenseKey>
 */
class LicenseKeyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'key_value' => strtoupper($this->faker->regexify('[A-Z0-9]{5}-[A-Z0-9]{5}-[A-Z0-9]{5}-[A-Z0-9]{5}-[A-Z0-9]{5}')),
            'status' => 'available',
        ];
    }
}
