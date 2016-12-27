<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_music')->unsigned();
            $table->foreign('id_music')->references('id')->on('records')->onDelete('cascade');
            $table->string('name_spotify')->nullable();
            $table->string('link_spotify')->nullable();
            $table->string('name_soundcloud')->nullable();
            $table->string('link_soundcloud')->nullable();
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
        Schema::drop('music_records');
    }
}
