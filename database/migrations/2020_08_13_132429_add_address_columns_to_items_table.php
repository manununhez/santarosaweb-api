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
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('house_number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city');
            $table->string('postal_code')->nullable();
            $table->string('coordinate_latitude');
            $table->string('coordinate_longitude');
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
            $table->dropColumn('address_1');
            $table->dropColumn('address_2');
            $table->dropColumn('house_number');
            $table->dropColumn('neighborhood');
            $table->dropColumn('city');
            $table->dropColumn('postal_code');
            $table->dropColumn('coordinate_latitude');
            $table->dropColumn('coordinate_longitude');
        });
    }
}
