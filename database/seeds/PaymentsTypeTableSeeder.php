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
            PaymentType::create([
                'payment_type_id' => Str::random(6),
                'name' => Str::random(8),
                'description' => $faker->paragraph,
            ]);
        }
    }
}
