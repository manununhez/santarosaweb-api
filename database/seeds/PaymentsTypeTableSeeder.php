<?php

use Illuminate\Database\Seeder;
use App\PaymentType;

class PaymentsTypeTableSeeder extends Seeder
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
            $name = Str::random(8);
            PaymentType::create([
                'payment_type_id' => Str::lower(str_replace(" ", "-", $name)),
                'name' => $name,
                'description' => $faker->paragraph,
            ]);
        }
    }
}
