<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameToVideoRadioProgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_radio_progs', function (Blueprint $table) {
            $table->string('name')->after('id_video_prog')->unique;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_radio_progs', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}
