<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $product = Product::inRandomOrder()->first();

        return [
            'order_id' => null,
            'vendor_id' => null,
            'product_id' => $product->id,
            'quantity' => fake()->numberBetween(1, 5),
            'price' => $product->regular_price,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
     /**
     * Assign a specific order to this order item
     */
     public function forOrder($order)
    {
        return $this->state(function () use ($order) {
            return [
                'order_id' => $order->id,
            ];
        });
    }

    /**
     * Assign a specific product to this order item
     */
    public function forProduct($product)
    {
        return $this->state(function () use ($product) {
            return [
                'product_id' => $product->id,
                'vendor_id' => $product->vendor_id,
                'price'      => $product->regular_price,
            ];
        });
    }
}
