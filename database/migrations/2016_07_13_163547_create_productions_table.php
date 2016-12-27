<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date_start');
            $table->string('date_end');
            $table->mediumText('disc');
            $table->string('productors');
            $table->string('integrantes')->nullable();
            $table->string('mixing');
            $table->string('mastering');
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
        Schema::drop('productions');
    }
}
