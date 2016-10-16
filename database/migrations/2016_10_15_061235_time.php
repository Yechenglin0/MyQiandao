<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Time extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('time22', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid');
            $table->string('username');
            $table->integer('days');
            $table->integer('times');
            $table->char('lastSign',6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}