<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masters', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->unique();
            $table->string("password");
            $table->unsignedTinyInteger("status")->default(\App\Models\Master::STATUS_MODERATION);
            $table->string("photo")->nullable();
            $table->unsignedTinyInteger("gender")->default(\App\Models\Master::GENDER_FEMALE);
            $table->text("description")->nullable();
            $table->date("experience_from")->nullable();
            $table->boolean("is_working_with_men")->default(true);
            $table->boolean("has_single_use_items")->default(true);
            $table->string("instagram")->nullable();
            $table->jsonb("education")->nullable();
            $table->string("phone_number");
            $table->boolean("has_whatsapp")->default(true);
            $table->jsonb("materials")->nullable();
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
        Schema::dropIfExists('masters');
    }
}
