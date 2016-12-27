<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_homes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_categs')->unsigned();
            $table->foreign('id_categs')->references('id')->on('image_home_categs')->onDelete('cascade');
            $table->string('name');
            $table->mediumtext('image');
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
        Schema::drop('image_homes');
    }
}
