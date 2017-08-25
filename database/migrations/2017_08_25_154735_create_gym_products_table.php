<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_products', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('gyms_id')->unsigned();

            $table->string('label');
            $table->string('description')->nullable();
            $table->string('measure');
            $table->integer('amount');
            $table->integer('min_amount');
            $table->decimal('price');
            $table->string('picture')->nullable();
            $table->string('barcode')->nullable();

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
        Schema::dropIfExists('gym_products');
    }
}
