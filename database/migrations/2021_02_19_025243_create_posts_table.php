<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable();
            $table->foreignId('parent_id')->nullable()
                ->comment('The parent id to identify the parent post. It can be used to form the table of content of the parent post of series.');
            $table->string('title');
            $table->string('meta_title')->nullable()
                ->comment('The meta title to be used for browser title and SEO.');
            $table->string('slug');
            $table->text('summary')->nullable()
                ->comment('	The summary of the post to mention the key highlights.');
            $table->jsonb('content')->nullable()->default(null);

            $table->boolean('is_published')->default(false);
            $table->dateTime('published_at')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->onDelete('set null')
                ->onUpdate('no action');

            $table->foreign('parent_id')
                ->references('id')
                ->on('posts')
                ->onDelete('set null')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
