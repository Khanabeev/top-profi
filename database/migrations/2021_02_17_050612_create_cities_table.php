<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('region');
            $table->string('federal_district');
            $table->decimal('lat', 10,8);
            $table->decimal('lng', 11,8);
        });

        // csvToArray function in app/helpers.php
        $cities = csvToArray(storage_path('app/public/cities.csv'),',');
        DB::table('cities')->insert($cities);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
