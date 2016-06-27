<?php
//php artisan make:migration create_address_table --create=address
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country');
            $table->integer('postalcode');
            $table->string('city');
            $table->string('street');
            $table->string('number');
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('address_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('address');
    }
}
