<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // Create 25 section records
        for ($i = 0; $i < 25; $i++) {
            Product::create([
                'name' => Str::random(8),
                'description' => $faker->paragraph,
                'image_url' => $faker->url,
                'price' => $faker->randomNumber(7),
            ]);
        }
    }
}
