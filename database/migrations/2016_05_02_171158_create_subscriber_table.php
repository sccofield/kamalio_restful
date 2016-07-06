<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriber', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('domain');
            $table->string('password');
            $table->string('email_address');
            $table->string('ha1');
            $table->string('ha1b');
            $table->string('rpid');
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
        Schema::drop('subscriber');
    }
}
