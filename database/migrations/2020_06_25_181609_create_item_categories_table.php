<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_categories', function (Blueprint $table) {
            $table->string('item_category_id')->primary();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('address_item_id');
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('delivery_available')->default(false);
            $table->string('info_hours_id');
            $table->string('info_hours_opening');
            $table->string('info_hours_closing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_categories');
    }
}
