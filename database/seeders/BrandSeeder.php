<?php

namespace Database\Seeders;

use App\Models\Brand;
use File;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(File::get(storage_path('data/brands.json')), true);
        foreach ($data as $key => $Value) {
            Brand::create($Value);
        }
/*        $faker = Factory::create();
        foreach (range(1, 100) as $index)
        {
            $name = $faker->name;
            Brand::create([
                'create_by' => rand(1, 50),
                'name' => $name,
                'slug' => strtolower(str_replace(' ', '-',$name)),
                'status' => $this->RandomStatus()
            ]);
        }*/
    }
    public function RandomStatus()
    {
        $Status = array('active' => 'active', 'inactive'=> 'inactive');
        return array_rand($Status);
    }
}
