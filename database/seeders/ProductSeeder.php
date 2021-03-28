<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 500) as $index) {
            $name = $faker->name('mail');
            Product::create([
                'name'          => $name,
                'slug'          => slugify($name),
                'category_id'   => rand(1, 100),
                'brand_id'      => rand(1, 10),
                'model'         => substr(uniqid(), 0, 15),
                'buying_price'  => rand(1, 500),
                'selling_price' => rand(1, 500),
                'special_price' => rand(1, 500),
                //'special_price_form' => rand(1, 12) . '/' . rand(1, 30) . '/' . '20' . rand(2, 3),
                //'special_price_to'   => rand(1, 12) . '/' . rand(1, 30) . '/' . '20' . rand(2, 3),
                'quantity'      => rand(1, 10),
                'sku_code'      => rand(1, 50),
                'color'         => json_encode(array_rand(Color()), 3),
                'size'          => json_encode(array_rand(Size(), 3)),
                'description'   => substr($faker->text, 0, 200),
                //'warranty'           => substr($faker->text, 0, 200),
                //'warranty_duration'  => substr($faker->text, 0, 200),
                //'warranty_condition' => substr($faker->text, 0, 200),
                'thumbnail'     => '(' . rand(1, 33) . ').jpg',
                'image'         => json_encode(array_rand([
                    '(' . rand(1, 33) . ').jpg',
                    '(' . rand(1, 33) . ').jpg',
                    '(' . rand(1, 33) . ').jpg',
                    '(' . rand(1, 33) . ').jpg',
                    '(' . rand(1, 33) . ').jpg',
                    ])),
                'status'        => RandomStatus(),
                'create_by'     => rand(1, 50)
            ]);
        }
    }
}
