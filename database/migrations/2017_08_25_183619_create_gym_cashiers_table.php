<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymCashiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_cashiers', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('gyms_id')->unsigned();
            $table->integer('gym_users_id')->unsigned();
            $table->string('operation');
            $table->enum('type',['sale','plan_payment','refound','drop']);
            $table->timestamps();

            $table->foreign('gyms_id')->references('id')->on('gyms')->onDelete('cascade');
            $table->foreign('gym_users_id')->references('id')->on('gym_users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_cashiers');
    }
}
