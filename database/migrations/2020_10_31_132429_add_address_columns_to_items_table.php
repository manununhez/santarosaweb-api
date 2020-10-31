<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressColumnsToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_categories', function (Blueprint $table) {
            $table->string('title_slider_1')->nullable();
            $table->string('description_slider_1')->nullable();
            $table->string('image_url_slider_1')->nullable();
            $table->string('title_slider_2')->nullable();
            $table->string('description_slider_2')->nullable();
            $table->string('image_url_slider_2')->nullable();
            $table->string('title_slider_3')->nullable();
            $table->string('description_slider_3')->nullable();
            $table->string('image_url_slider_3')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('footer_title')->nullable();
            $table->string('footer_description')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('product_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_categories', function (Blueprint $table) {
            $table->dropColumn('title_slider_1');
            $table->dropColumn('description_slider_1');
            $table->dropColumn('image_url_slider_1');
            $table->dropColumn('title_slider_2');
            $table->dropColumn('description_slider_2');
            $table->dropColumn('image_url_slider_2');
            $table->dropColumn('title_slider_3');
            $table->dropColumn('description_slider_3');
            $table->dropColumn('image_url_slider_3');
            $table->dropColumn('whatsapp');
            $table->dropColumn('footer_title');
            $table->dropColumn('footer_description');
            $table->dropColumn('twitter');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('linkedin');
            $table->dropColumn('product_type');
        });
    }
}
