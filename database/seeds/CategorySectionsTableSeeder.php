<?php

use Illuminate\Database\Seeder;
use App\CategorySection;

class CategorySectionsTableSeeder extends Seeder
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
            CategorySection::create([
                'section_id' => $faker->randomNumber(1),
                'category_id' => $faker->randomNumber(1),
            ]);
        }
    }
}
