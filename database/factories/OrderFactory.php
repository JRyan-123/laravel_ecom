<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $customer = User::where('role', 2)->inRandomOrder()->first();
        $createdAt = $this->faker->dateTimeBetween('-1 year', 'now');

        return [
            'user_id' => $customer->id,
            'status' => fake()->randomElement(['Pending', 'Completed', 'In Transit','Cancelled']),
            'shipping' => fake()->randomElement([45,65,0]),
            'total' => 0,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
