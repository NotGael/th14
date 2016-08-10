<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned()->index()->nullable()->default(null);
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('content')->nullable()->default(null);
            $table->dateTime('start')->format('d-m-Y H:i');
            $table->dateTime('end')->format('d-m-Y H:i')->nullable()->default(null);
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
        Schema::drop('events');
    }
}
