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
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('house_number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city');
            $table->string('postal_code')->nullable();
            $table->string('coordinate_latitude');
            $table->string('coordinate_longitude');
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('title_slider_1')->nullable();
            $table->string('title_slider_2')->nullable();
            $table->string('title_slider_3')->nullable();
            $table->string('description_slider_1')->nullable();
            $table->string('description_slider_2')->nullable();
            $table->string('description_slider_3')->nullable();
            $table->string('image_url_slider_1')->nullable();
            $table->string('image_url_slider_2')->nullable();
            $table->string('image_url_slider_3')->nullable();
            $table->string('image_url_icon')->nullable();
            $table->string('image_url_logo')->nullable();
            $table->string('footer_title')->nullable();
            $table->string('footer_description')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('product_type')->nullable();
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
