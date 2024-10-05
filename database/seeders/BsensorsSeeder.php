<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BsensorsSeeder extends Seeder
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
            DB::table('sensors')->insert([
                'user_id' => $faker->numberBetween(1, 10), // Mengasumsikan user_id dari 1-10
                'name_sensor' => $faker->word,
                'created_at' => now(),
            ]);
        }
    }
}
