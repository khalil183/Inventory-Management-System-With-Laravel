<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->integer('product_qty');
            $table->string('barcode');
            $table->double('purchase_price');
            $table->double('selling_price');
            $table->integer('supplyer_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('image');
            $table->date('purchase_date');
            $table->string('purchase_month');
            $table->string('purchase_year');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
