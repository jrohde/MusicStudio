<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgRadioProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_radio_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_img_prog')->unsigned();
            $table->foreign('id_img_prog')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::drop('img_radio_programs');
    }
}
