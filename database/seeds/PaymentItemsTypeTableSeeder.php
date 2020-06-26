<?php

use Illuminate\Database\Seeder;
use App\ItemPaymentType;

class PaymentItemsTypeTableSeeder extends Seeder
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
            ItemPaymentType::create([
                'category_item_id' => $faker->randomNumber(1),
                'payment_type_id' => $faker->randomNumber(1),
            ]);
        }
    }
}
