<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_plans', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sports_id')->unsigned();
            $table->string('plan');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('sports_id')->references('id')->on('gym_sports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_plans');
    }
}
