<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grade');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('totem');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tel');
            $table->string('image_name')->unique();
            $table->string('image_path');
            $table->string('image_extension', 10);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
