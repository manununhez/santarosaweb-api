<?php

use Illuminate\Database\Seeder;
use App\CategoryItemCategory;

class CategoryItemsCategoryTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // Create 10 section records
        for ($i = 0; $i < 10; $i++) {
            CategoryItemCategory::create([
                'category_item_id' => $faker->randomNumber(1),
                'category_id' => $faker->randomNumber(1),
            ]);
        }
    }
}
