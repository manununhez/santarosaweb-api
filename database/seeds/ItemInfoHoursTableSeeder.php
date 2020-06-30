<?php

use Illuminate\Database\Seeder;

use App\ItemInfoHours;

class ItemInfoHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // Create 5 section records
        for ($i = 0; $i < 5; $i++) {
            ItemInfoHours::create([
                'info_hours_id' => Str::random(6),
                'work_days_description' => Str::random(12),
            ]);
        }
    }
}
