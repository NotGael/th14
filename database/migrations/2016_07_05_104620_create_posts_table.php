<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('section_id')->unsigned()->index()->nullable()->default(null);
            $table->integer('photography_id')->unsigned()->index()->nullable()->default(null);
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->boolean('online')->default(false);
            $table->dateTime('published_at')->nullable()->default(null);
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
        Schema::drop('posts');
    }
}
