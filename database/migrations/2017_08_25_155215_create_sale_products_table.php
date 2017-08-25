<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_products', function (Blueprint $table)
        {
            $table->integer('sales_id')->unsigned();
            $table->integer('products_id')->unsigned();
            $table->foreign('sales_id')->references('id')->on('gym_sales')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('gym_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_products');
    }
}
