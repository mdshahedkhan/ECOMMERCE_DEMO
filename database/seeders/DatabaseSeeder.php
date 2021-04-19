<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            SliderSeeder::class,
            CustomerSeeder::class,
            ShippingSeeder::class,
            OrderSeeder::class,
            OrderInfoSeeder::class,
            PaymentSeeder::class,
            subscribersSeeder::class,
        ]);
    }
}
