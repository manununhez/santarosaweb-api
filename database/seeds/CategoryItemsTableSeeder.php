<?php

use Illuminate\Database\Seeder;
use App\ItemCategory;

class CategoryItemsTableSeeder extends Seeder
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
            $name = Str::random(8);
            ItemCategory::create([
                'item_category_id' => Str::lower(str_replace(" ", "-", $name)),
                'name' => $name,
                'description' => $faker->paragraph,
                'address_item_id' => $faker->randomNumber(2),
                'website' => $faker->url,
                'phone' => $faker->randomNumber(5),
                'image_url' => $faker->url,
                'delivery_available' => $faker->boolean(50),
                'info_hours_id' => $faker->randomNumber(2),
                'info_hours_opening' => $faker->randomNumber(2),
                'info_hours_closing' => $faker->randomNumber(2),
            ]);
        }
    }
}
