<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([

            [
            'name' => 'vendor',
            'email' => 'vendor@example.com',
            'role'  =>  1,
            'password' => Hash::make('1111'),
            ],
            [
            'name' => 'customer',
            'email' => 'customer@example.com',
            'role'  =>  2,
            'password' => Hash::make('1111'),
            ],
            [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role'  =>  0,
            'password' => Hash::make('1111'),
            ],
        ]);
        User::factory()->count(10)->state(['role' => 1])->create(); 
        User::factory()->count(20)->state(['role' => 2])->create(); 
    }
}
