<?php

namespace Database\Seeders;

use App\Models\OrderInfo;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrderInfoSeeder extends Seeder
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
            OrderInfo::create([
                'order_id'      => rand(1, 50),
                'product_id'    => rand(1, 200),
                'product_name'  => $faker->name,
                'product_price' => rand(200, 900),
                'product_qty'   => rand(1, 5),
            ]);
        }
    }
}
