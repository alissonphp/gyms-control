<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_infos', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('athletes_id')->unsigned();
            $table->string('rg')->nullable();
            $table->date('birth')->nullable();
            $table->enum('genre',['male','female'])->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('picture_url')->nullable();
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
        Schema::dropIfExists('athlete_infos');
    }
}
