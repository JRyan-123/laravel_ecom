<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Subcategory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   

        $subcategory = Subcategory::inRandomOrder()->first(); // pick a random subcategory
        $category = $subcategory->category;
        return [
            'vendor_id' => null,
            'category_id' =>  $category->id,
            'subcategory_id' =>  $subcategory->id,
            'product_name' => fake()->words(4, true),
            'description' => fake()->sentence(20),
            'sku' => strtoupper($this->faker->unique()->bothify('PROD-###??')),
            'regular_price' => fake()->randomFloat(2, 50, 1000),
            'stock_quantity' => fake()->numberBetween(0, 100),
        ];
    }
}
