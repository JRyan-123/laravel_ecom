<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // select all sellers
        $vendors = User::where('role', 1)->get();

        // each seller has 3 products assigns 2 images 
        foreach ($vendors as $vendor) {
            
            Product::factory()->count(3)->create([
                'vendor_id' => $vendor->id
            ])->each(function ($product) {
                ProductImage::factory()->count(2)->create([
                    'product_id' => $product->id
                ]);
            });
        }
    }
}
