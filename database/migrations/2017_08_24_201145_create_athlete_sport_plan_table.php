<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteSportPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_sport_plans', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('athletes_id')->unsigned();
            $table->integer('plan_periodicitys_id')->unsigned();
            $table->date('registration');
            $table->date('next_expiration');
            $table->timestamps();
            $table->foreign('athletes_id')->references('id')->on('gym_athletes')->onDelete('cascade');
            $table->foreign('plan_periodicitys_id')->references('id')->on('plan_periodicity')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athlete_sport_plans');
    }
}
