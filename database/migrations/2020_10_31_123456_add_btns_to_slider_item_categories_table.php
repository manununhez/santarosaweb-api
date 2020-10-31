<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBtnsToSliderItemCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_categories', function (Blueprint $table) {
            $table->string('btn_text_slider_1')->nullable();
            $table->string('btn_link_slider_1')->nullable();
            $table->string('btn_text_slider_2')->nullable();
            $table->string('btn_link_slider_2')->nullable();
            $table->string('btn_text_slider_3')->nullable();
            $table->string('btn_link_slider_3')->nullable();
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
            $table->dropColumn('btn_text_slider_1');
            $table->dropColumn('btn_link_slider_1');
            $table->dropColumn('btn_text_slider_2');
            $table->dropColumn('btn_link_slider_2');
            $table->dropColumn('btn_text_slider_3');
            $table->dropColumn('btn_link_slider_3');
        });
    }
}
