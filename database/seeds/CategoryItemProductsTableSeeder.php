<?php

use Illuminate\Database\Seeder;
use App\ItemCategoryProduct;

class CategoryItemProductsTableSeeder extends Seeder
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
            ItemCategoryProduct::create([
                'category_item_id' => $faker->randomNumber(1),
                'product_id' => $faker->randomNumber(1),
            ]);
        }
    }
}
