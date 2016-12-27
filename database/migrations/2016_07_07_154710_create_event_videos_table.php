<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_event')->unsigned();
            $table->foreign('id_event')->references('id')->on('events')->onDelete('cascade');
            $table->string('name');
            $table->mediumtext('basic_url');
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
        Schema::drop('event_videos');
    }
}
