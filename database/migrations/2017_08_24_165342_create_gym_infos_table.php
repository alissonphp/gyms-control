<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_infos',function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('gyms_id')->unsigned();
            $table->string('address');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('zipcode');
            $table->string('state');
            $table->string('city');
            $table->string('email');
            $table->string('telephone');
            $table->string('telephone2')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('lati')->nullable();
            $table->string('long')->nullable();
            $table->timestamps();

            $table->foreign('gyms_id')->references('id')->on('gyms')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_infos');
    }
}
