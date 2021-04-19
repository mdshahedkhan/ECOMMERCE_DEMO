<?php

namespace Database\Seeders;

use App\Models\Subscribers;
use Faker\Factory;
use Illuminate\Database\Seeder;

class subscribersSeeder extends Seeder
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
            Subscribers::create([
                'customer_id' => rand(1, 50),
                'email'       => $faker->email
            ]);
        }
    }
}
