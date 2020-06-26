<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // Create 15 section records
        for ($i = 0; $i < 25; $i++) {
            Category::create([
                'name' => $faker->name,
                'description' => $faker->paragraph,
                'image_url' => $faker->url,
            ]);
        }
    }
}
