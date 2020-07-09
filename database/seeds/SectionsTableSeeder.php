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
            $name = Str::random(8);
            Section::create([
                'section_id' => Str::lower(str_replace(" ", "-", $name)),
                'name' => $name,
                'description' => $faker->paragraph,
                'image_url' => $faker->url,
            ]);
        }
    }
}
