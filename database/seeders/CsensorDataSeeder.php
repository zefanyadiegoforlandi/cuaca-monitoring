<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CsensorDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('sensor_data')->insert([
                'sensor_id' => $faker->numberBetween(1, 10), // Mengasumsikan sensor_id dari 1-10
                'altitude' => $faker->randomFloat(2, 0, 10000), // Menghasilkan nilai ketinggian
                'pressure' => $faker->randomFloat(2, 950, 1050), // Menghasilkan nilai tekanan
                'temperature' => $faker->randomFloat(2, -20, 50), // Menghasilkan nilai suhu
                'humidity' => $faker->randomFloat(2, 0, 100), // Menghasilkan nilai kelembapan
                'created_at' => now(),
            ]);
        }
    }
}
