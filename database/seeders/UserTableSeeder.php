<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->DefaultUser();
        $faker = Factory::create();
        foreach(range(1, 50) as $index)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password)
            ]);
        }
    }

    protected function DefaultUser()
    {
        User::create([
            'name' => 'Shahed Khan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
