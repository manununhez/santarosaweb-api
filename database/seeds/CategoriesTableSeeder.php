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
            $name = Str::random(8);
            Category::create([
                'category_id' => Str::lower(str_replace(" ", "-", $name)),
                'name' => $name,
                'description' => $faker->paragraph,
                'image_url' => $faker->url,
            ]);
        }
    }
}
