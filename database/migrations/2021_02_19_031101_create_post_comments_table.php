<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->nullable();
            $table->foreignId('parent_id')->nullable()
                ->comment('The parent id to identify the parent comment.');
            $table->string('title');
            $table->text('content')->nullable()->default(null);
            $table->boolean('is_published')->default(false);
            $table->dateTime('published_at')->nullable()->default(null);

            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('set null');

            $table->foreign('parent_id')
                ->references('id')
                ->on('post_comments')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comments');
    }
}
