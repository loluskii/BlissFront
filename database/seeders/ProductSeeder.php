<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('products')->insert([
            "name" => $faker->name(),
            "description" => $faker->description,
            "price" => $faker->numberBetween(25, 50),
            "cover_img" => $faker->imageUrl($width = 640, $height = 480),
        ]);
    }
}
