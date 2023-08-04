<?php

namespace Database\Seeders;

use App\Models\Car;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 20; $i++){
            Car::create([
                'merek' => $faker->word,
                'model' => $faker->word,
                'plate_number' => $faker->unique()->randomNumber(6),
                'daily_rate' => $faker->randomFloat(2, 50, 200),
                'status' => $faker->randomElement(['Tersedia', 'Tidak Tersedia']),
            ]);
         }
    }
}
