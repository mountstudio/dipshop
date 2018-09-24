<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCategoryPropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('category_props', 'category_properties');
        Schema::table('category_properties', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->integer('category_id')->first();
            $table->integer('property_id')->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('category_props', 'category_properties');
        Schema::table('category_properties', function (Blueprint $table) {
            $table->increments('id')->first();
            $table->dropColumn(['category_id', 'property_id']);
        });
    }
}
