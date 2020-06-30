<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCategoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_category_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_category_id');
            $table->string('product_id');
            $table->timestamps();

            $table->unique(['item_category_id', 'product_id'], 'un_category_item_products');

            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('item_category_products');
    }
}
