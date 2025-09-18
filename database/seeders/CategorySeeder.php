<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics' => ['Mobile Phones', 'Laptops', 'Cameras'],
            'Fashion' => ['Men’s Clothing', 'Women’s Clothing', 'Accessories'],
            'Home & Living' => ['Furniture', 'Kitchen', 'Decor'],
            'Beauty & Health' => ['Skincare', 'Makeup', 'Supplements'],
            'Sports & Outdoors' => ['Fitness Equipment', 'Cycling', 'Camping & Hiking'],
            'Automotive' => ['Car Accessories', 'Motorcycle Parts', 'Car Care'],
            'Toys & Games' => ['Action Figures', 'Board Games', 'Educational Toys'],
            'Books & Stationery' => ['Fiction', 'Non-fiction', 'Office Supplies'],
            'Groceries' => ['Beverages', 'Snacks', 'Fresh Produce'],
            'Pet Supplies' => ['Dog', 'Cat', 'Fish & Aquarium'],
        ];

       foreach ($categories as $categoryName => $subcategories) {
            $category = Category::create(['category_name' => $categoryName]);

            $category->subcategories()->createMany(
                collect($subcategories)->map(fn ($name) => ['subcategory_name' => $name])->toArray()
            );
        }
    }
}
