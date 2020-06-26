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
            $table->integer('category_item_id')->unsigned();
            $table->integer('payment_type_id')->unsigned();
            $table->timestamps();

            $table->unique(['category_item_id', 'payment_type_id'], 'un_category_item_payment');

            $table->foreign('payment_type_id')->references('id')->on('payment_types')->onDelete('cascade');
            $table->foreign('category_item_id')->references('id')->on('item_categories')->onDelete('cascade');
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
