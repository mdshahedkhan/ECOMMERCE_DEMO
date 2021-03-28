<?php

namespace Database\Seeders;

use App\Models\Slider;
use Faker\Factory;
use Illuminate\Database\Seeder;
use File;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 50) as $index) {
            Slider::create([
                'create_by'  => rand(1, 50),
                'title'      => $faker->name,
                'sub_title'  => substr($faker->paragraph, 0, 59),
                'url'        => $faker->url,
                'start_date' => $faker->date('Y-m-d'),
                'end_date'   => $faker->date('Y-m-d'),
                'image'      => '(' . rand(1, 3) . ').jpg',
                'status'     => RandomStatus()
            ]);
        }
    }
}
