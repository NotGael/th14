<?php
//php artisan make:migration create_sections_table --create=sections
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable()->default(null);
            $table->string('name');
            $table->longText('content');
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('section_id')->unsigned()->index()->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sections');
    }
}
