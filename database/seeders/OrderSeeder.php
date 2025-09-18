<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use App\Models\Address;
class OrderSeeder extends Seeder
{

    public function run(): void
    {
       $products = Product::all(); 

        Order::factory()->count(100)->create()->each(function($order) use ($products) {

            // Random timestamp
            $createdAt = now()->subDays(rand(1,365));
            $order->created_at = $createdAt;
            $order->updated_at = $createdAt;
            $order->save();

            // 1-5 products
            $orderProducts = collect($products->random(rand(1,5)));

            // save each product to order_items table
            $orderItems = collect(); //holds all products to get total
            foreach ($orderProducts as $product) {
                $orderItems->push(
                    OrderItem::factory()
                        ->forOrder($order)
                        ->forProduct($product)
                        ->create([
                            'created_at' => $createdAt,
                            'updated_at' => $createdAt,
                        ])
                );
            }

            // Calculate total for orders table
            $order->total = $orderItems->sum(fn($i)=> $i->price * $i->quantity);
            $order->save();

            // save address with same date
            $order->address()->save(
                Address::factory()->make([
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ])
            );
        });
    }
}
