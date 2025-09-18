<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Address;
class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::all()->each(function ($order) {
            $order->address()->save(
                Address::factory()->make([
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at,
                ])
            );
        });
    }
}
