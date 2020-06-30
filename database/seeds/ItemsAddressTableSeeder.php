<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\ItemAddress;

class ItemsAddressTableSeeder extends Seeder
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
            ItemAddress::create([
                'item_address_id' => Str::random(6),
                'address_1' => $faker->address,
                'address_2' => $faker->address,
                'house_number' => $faker->randomNumber(2),
                'neighborhood' => Str::random(10),
                'city' => Str::random(8),
                'postal_code' => $faker->randomNumber(5),
                'coordinate_latitude' => $faker->randomNumber(7),
                'coordinate_longitude' => $faker->randomNumber(7),
            ]);
        }
    }
}
