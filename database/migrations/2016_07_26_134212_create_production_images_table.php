<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_prod')->unsigned();
            $table->foreign('id_prod')->references('id')->on('productions')->onDelete('cascade');
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
        Schema::drop('production_images');
    }
}
