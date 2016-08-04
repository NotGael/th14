<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->boolean('online')->default(false);
            $table->string('image_name')->unique();
            $table->string('image_path');
            $table->string('image_extension', 10);
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('photography_id')->unsigned()->index()->nullable()->default(null);
        });

        Schema::table('sections', function(Blueprint $table) {
            $table->integer('photography_id')->unsigned()->index()->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photographies');
    }
}
