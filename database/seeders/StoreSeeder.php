<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\User;
class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // consider only sellers to create store
        $sellers = User::where('role', 1)->get();

        $sellers->each(fn($seller) => 
            Store::factory()->for($seller, 'vendor')->create()
        );
    }
}
