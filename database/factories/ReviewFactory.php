<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'      => null, 
            'order_item_id' => null, 
            'user_id'   =>  null,
            'product_id'    => null,
            'rating'        => fake()->numberBetween(1, 5),
            'review'       => fake()->paragraph(),
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
     /**
     * Assign the review to a specific order item.
     */
    public function forOrderItem($orderItem)
    {
        return $this->state(function () use ($orderItem) {
            return [
                'order_id'      => $orderItem->order->id,
                'order_item_id' => $orderItem->id,
                'user_id'       => $orderItem->order->user_id,
                'product_id'    => $orderItem->product_id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        });
    }
}
