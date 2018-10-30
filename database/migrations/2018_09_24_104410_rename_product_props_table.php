<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameProductPropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('product_props', 'product_properties');
        Schema::table('product_properties', function (Blueprint $table) {
            $table->integer('product_id')->after('id');
            $table->integer('property_id')->after('product_id');
            $table->string('value')->after('property_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('product_properties', 'product_props');
        Schema::table('product_props', function (Blueprint $table) {
            $table->dropColumn(['product_id', 'property_id', 'value']);
        });
    }
}
