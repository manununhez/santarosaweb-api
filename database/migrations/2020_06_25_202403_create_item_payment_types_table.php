<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_payment_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_category_id');
            $table->string('payment_type_id');
            $table->timestamps();

            $table->unique(['item_category_id', 'payment_type_id'], 'un_category_item_payment');

            $table->foreign('payment_type_id')->references('payment_type_id')->on('payment_types')->onDelete('cascade');
            $table->foreign('item_category_id')->references('item_category_id')->on('item_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_payment_types');
    }
}
