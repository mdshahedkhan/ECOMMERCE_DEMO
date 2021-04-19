<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
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
            Shipping::create([
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'address'    => $faker->address,
                'phone'      => '017' . rand(5, 9) . rand(111111, 999999)
            ]);
        }
    }
}
