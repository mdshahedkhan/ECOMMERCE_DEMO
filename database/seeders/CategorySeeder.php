<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use File;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(File::get(storage_path('data/categories (3).json')), true);
        foreach ($data as $key => $value) {
            Category::create($value);
        }
        /*$faker = Factory::create();
        foreach (range(1, 50) as $index)
        {
            $name = $faker->name;
            Category::create([
                'root' => rand(0, 50),
                'create_by' => rand(1, 50),
                'name' => $name,
                'slug' => slugify($name),
                'status' => RandomStatus()
            ]);
        }*/
    }
}
