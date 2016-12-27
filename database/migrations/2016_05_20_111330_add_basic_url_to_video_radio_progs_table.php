<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBasicUrlToVideoRadioProgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_radio_progs', function (Blueprint $table) {
            $table->mediumtext('basic_url')->after('name')->unique;
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
            $table->dropColumn('basic_url');
        });
    }
}
