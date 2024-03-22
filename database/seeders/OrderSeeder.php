<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
        'product_name' => 'Shoe1',
        'quantity' => 10,
        'status_id' => 1
        ]);

        Order::create([
        'product_name' => 'Shoe2',
        'quantity' => 20,
        'status_id' => 2
        ]);
    }

}
