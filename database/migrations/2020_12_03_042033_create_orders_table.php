<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->integer('customer_id');
            $table->string('order_code');
            $table->double('total_amount');
            $table->double('payable_amount');
            $table->double('due_amount');
            $table->integer('total_product');
            $table->string('payment_method');
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
