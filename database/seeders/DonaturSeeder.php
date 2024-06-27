<?php

namespace Database\Seeders;

use App\Models\DonaturPerson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            DonaturPerson::create([
                'auth_id' => $faker->numberBetween(1, 10),
               'status' => $faker->randomElement(['active', 'inactive']),
                'total_price' => $faker->numberBetween(100000, 1000000),
            ]);
        }
    }
}
