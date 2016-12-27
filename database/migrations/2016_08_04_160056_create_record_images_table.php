<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rec')->unsigned();
            $table->foreign('id_rec')->references('id')->on('records')->onDelete('cascade');
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
        Schema::drop('record_images');
    }
}
