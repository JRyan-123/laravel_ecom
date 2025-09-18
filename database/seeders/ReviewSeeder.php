<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Review;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Only consider order items from completed orders
        $orderItems = OrderItem::whereHas('order', function ($q) {
            $q->where('status', 'completed');
        })->get();

        foreach ($orderItems as $item) {
           
                $created = $faker->dateTimeBetween($item->order->created_at, 'now');
                $updated = $faker->dateTimeBetween($created, 'now');

                // Use the factory with the custom state
                Review::factory()
                    ->forOrderItem($item)
                    ->create([
                        'created_at' => $created,
                        'updated_at' => $updated,
                    ]);
            
        }
    }
}