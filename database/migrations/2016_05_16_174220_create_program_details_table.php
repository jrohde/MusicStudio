<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_program')->unsigned();
            $table->foreign('id_program')->references('id')->on('programs')->onDelete('cascade');
            $table->text('intro');
            $table->mediumText('link_streaming');
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
        Schema::drop('program_details');
    }
}
