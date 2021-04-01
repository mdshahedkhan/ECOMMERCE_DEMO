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
            $name   = $faker->name('mail');
            $images = [
                '(' . rand(1, 33) . ').jpg',
                '(' . rand(1, 33) . ').jpg',
                '(' . rand(1, 33) . ').jpg',
                '(' . rand(1, 33) . ').jpg',
                '(' . rand(1, 33) . ').jpg',
                '(' . rand(1, 33) . ').jpg',
            ];
            Product::create([
                'name'               => $name,
                'slug'               => slugify($name),
                'category_id'        => rand(1, 100),
                //'feature_pro'        => rand(0, 1),
                'brand_id'           => rand(1, 10),
                'model'              => substr(uniqid(), 0, 15),
                'buying_price'       => rand(1, 1000),
                'selling_price'      => rand(1, 1000),
                'special_price'      => rand(1, 800),
                'special_price_form' => date('Y-m-' . rand(1, 29)),
                'special_price_to'   => date('Y-' . rand(3, 5) . '-' . rand(1, 29)),
                'quantity'           => rand(1, 10),
                'sku_code'           => rand(1, 50),
                'color'              => json_encode(array_rand(Color()), 3),
                'size'               => json_encode(array_rand(Size(), 3)),
                'description'        => substr($faker->text, 0, 200),
                'warranty'           => rand(0, 1),
                'warranty_duration'  => substr($faker->text, 0, 30),
                'warranty_condition' => substr($faker->text, 0, 200),
                'thumbnail'          => '(' . rand(1, 33) . ').jpg',
                'image'              => json_encode($images),
                'status'             => RandomStatus(),
                'create_by'          => rand(1, 50)
            ]);
        }
    }
}
