<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_address', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('athletes_id')->unsigned();
            $table->string('address');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('state');
            $table->string('city');
            $table->timestamps();
            $table->foreign('athletes_id')->references('id')->on('gym_athletes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athlete_address');
    }
}
