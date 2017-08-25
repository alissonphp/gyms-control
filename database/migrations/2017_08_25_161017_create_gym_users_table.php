<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('gyms_id')->unsigned();
            $table->integer('roles_id')->unsigned();
            $table->string('name');
            $table->string('email',100)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('gyms_id')->references('id')->on('gyms')->onDelete('cascade');
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_users');
    }
}
