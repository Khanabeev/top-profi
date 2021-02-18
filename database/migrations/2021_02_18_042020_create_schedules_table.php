<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('day')->comment('Monday:1,Tuesday:2 ... search in the model');
            $table->unsignedSmallInteger('open_time')->comment('Minutes after midnight. If you need hours then dd/60, minutes dd%60');
            $table->unsignedSmallInteger('close_time')->comment('Minutes after midnight. If you need hours then dd/60, minutes dd%60');

            $table->unsignedBigInteger('scheduleable_id');
            $table->string('scheduleable_type');
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
        Schema::dropIfExists('schedules');
    }
}
