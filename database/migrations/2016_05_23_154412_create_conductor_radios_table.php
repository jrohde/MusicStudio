<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConductorRadiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductor_radios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_img_conduct')->unsigned();
            $table->foreign('id_img_conduct')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::drop('conductor_radios');
    }
}
