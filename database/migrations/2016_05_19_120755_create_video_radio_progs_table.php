<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoRadioProgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_radio_progs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_video_prog')->unsigned();
            $table->foreign('id_video_prog')->references('id')->on('programs')->onDelete('cascade');
            $table->mediumtext('link_video');
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
        Schema::drop('video_radio_progs');
    }
}
