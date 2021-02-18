<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterSalonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_salon', function (Blueprint $table) {
            $table->id();

            $table->foreignId('master_id');
            $table->foreignId('salon_id');

            $table->foreign('master_id')
                ->references('id')
                ->on('masters')
                ->onDelete('cascade');

            $table->foreign('salon_id')
                ->references('id')
                ->on('salons')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_salon');
    }
}
