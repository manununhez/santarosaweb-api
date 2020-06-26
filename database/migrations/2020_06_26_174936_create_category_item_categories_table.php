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
            $table->integer('category_id')->unsigned();
            $table->integer('category_item_id')->unsigned();
            $table->timestamps();

            $table->unique(['category_item_id', 'category_id'], 'un_category_items_category');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('category_item_categories');
    }
}
