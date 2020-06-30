<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryItemCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_item_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id');
            $table->string('item_category_id');
            $table->timestamps();

            $table->unique(['item_category_id', 'category_id'], 'un_category_items_category');

            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('category_item_categories');
    }
}
