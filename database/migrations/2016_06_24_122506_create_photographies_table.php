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
            $table->integer('section_id')->unsigned()->index();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->string('image_name')->unique();
            $table->string('image_path');
            $table->string('image_extension', 10);
            $table->string('mobile_image_name')->unique();
            $table->string('mobile_image_path');
            $table->string('mobile_extension', 10);
            $table->timestamps();
        });

        Schema::table('sections', function(Blueprint $table) {
            $table->integer('photography_id')->unsigned()->index();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('photography_id')->unsigned()->index();
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
