<?php
//php artisan make:migration create_addresses_table --create=addresses

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('postalcode');
            $table->string('city');
            $table->string('street');
            $table->string('number');
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('address_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}
