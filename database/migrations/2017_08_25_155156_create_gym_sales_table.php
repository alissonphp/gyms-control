<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_sales', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('gyms_id')->unsigned();
            $table->string('sales_code');
            $table->string('client')->nullable();
            $table->decimal('subtotal');
            $table->decimal('discount');
            $table->decimal('total');
            $table->enum('payment_type',['cash','credit-card','debit-card','other']);

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
        Schema::dropIfExists('gym_sales');
    }
}
