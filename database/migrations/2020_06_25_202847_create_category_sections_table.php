<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section_id');
            $table->string('category_id');
            $table->timestamps();

            $table->unique(['section_id', 'category_id'], 'un_category_section');

            $table->foreign('section_id')->references('section_id')->on('sections')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_sections');
    }
}
