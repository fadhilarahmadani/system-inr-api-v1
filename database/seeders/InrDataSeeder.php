<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InrDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            \App\Models\InrData::create([
                'auth_id' => $faker->numberBetween(1, 10),
                'name' => $faker->name,
                'photo_profile' => $faker->imageUrl(640, 480, 'people', true, 'Faker'),
                'class' => $faker->randomElement(['pendiri', '1','2','3','4','5','6','7','8','9','10','11','12','13','14','15']),
            ]);

    }
}
}
