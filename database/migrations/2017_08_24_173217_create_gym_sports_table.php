<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_sports', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('gyms_id')->unsigned();
            $table->string('sport');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('gym_sports');
    }
}
