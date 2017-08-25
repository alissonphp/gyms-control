<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteSportPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_sport_payments', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sport_plans_id')->unsigned();
            $table->string('reference');
            $table->timestamps();
            $table->foreign('sport_plans_id')->references('id')->on('athlete_sport_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athlete_sport_payments');
    }
}
