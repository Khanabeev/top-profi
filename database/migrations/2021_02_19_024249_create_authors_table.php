<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('nick_name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

            $table->string('city_id')->nullable();
            $table->string('phone_number')->nullable();

            $table->text('intro')->nullable()->comment('The brief introduction of the Author to be displayed on each post.');
            $table->text('profile')->nullable()->comment('The author details to be displayed on the Author Page.');
            $table->string('photo')->nullable()->default(null);
            $table->dateTime('last_login')->nullable();
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
        Schema::dropIfExists('authors');
    }
}
