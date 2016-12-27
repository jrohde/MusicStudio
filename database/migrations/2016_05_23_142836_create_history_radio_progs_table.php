<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryRadioProgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_radio_progs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_history_prog')->unsigned();
            $table->foreign('id_history_prog')->references('id')->on('programs')->onDelete('cascade');
            $table->string('name')->unique;
            $table->mediumtext('link_video');
            $table->mediumtext('basic_url')->unique;
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
        Schema::drop('history_radio_progs');
    }
}
