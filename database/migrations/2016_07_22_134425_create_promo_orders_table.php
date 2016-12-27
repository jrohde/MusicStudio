<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan', 50);
            $table->string('name', 50);
            $table->string('email', 100);
            $table->string('tel', 50)->nullable();
            $table->string('date', 80)->nullable();
            $table->text('message')->nullabel();
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
        Schema::drop('promo_orders');
    }
}
