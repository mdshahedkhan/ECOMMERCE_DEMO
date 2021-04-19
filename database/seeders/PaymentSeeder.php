<?php

namespace Database\Seeders;

use App\Models\Payment;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
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
            Payment::create([
                'order_id' => rand(1, 50),
                'type'     => 'bkash',
                'status'   => Random_Status()
            ]);
        }
    }
}
