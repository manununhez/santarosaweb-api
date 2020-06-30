<?php

use Illuminate\Database\Seeder;

use App\Section;

class SectionsTableSeeder extends Seeder
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
        for ($i = 0; $i < 15; $i++) {
            Section::create([
                'section_id' => Str::random(6),
                'name' => $faker->name,
                'description' => $faker->paragraph,
                'image_url' => $faker->url,
            ]);
        }
    }
}
