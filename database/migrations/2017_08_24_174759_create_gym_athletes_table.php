<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_athletes', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('gyms_id')->unsigned();
            $table->string('name');
            $table->string('document',30)->unique();
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
        Schema::dropIfExists('gym_athletes');
    }
}
