<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Order;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order = Order::inRandomOrder()->first();
         return [
            'order_id' => $order->id,
            'recipient' => fake()->name,
            'phone' => fake()->phoneNumber,
            'line1' => fake()->streetAddress,
            'line2' => fake()->secondaryAddress,
            'city' => fake()->city,
            'district' => fake()->state,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
