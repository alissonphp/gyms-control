<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanPeriodicityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_periodicity', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('plans_id')->unsigned();
            $table->string('label');
            $table->integer('payment_cycle');
            $table->timestamps();
            $table->foreign('plans_id')->references('id')->on('sport_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_periodicity');
    }
}
