<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_transactions', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sales_id')->unsigned();

            $table->enum('method', ['credit','debit']);
            $table->string('card_flag');
            $table->string('transaction_id');

            $table->timestamps();

            $table->foreign('sales_id')->references('id')->on('gym_sales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_transactions');
    }
}
