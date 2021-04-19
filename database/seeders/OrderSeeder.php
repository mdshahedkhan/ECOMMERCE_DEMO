<?php

namespace Database\Seeders;

use App\Models\Order;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 50) as $item) {
            Order::create([
                'customer_id' => rand(1, 50),
                'shipping_id' => rand(1, 50),
                'total'       => rand(300, 900),
                'status'      => Random_Status(),
            ]);
        }
    }
}
