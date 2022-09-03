<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *2022_08_17_132616_create_products_table
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('city');
            $table->string('region');
            $table->string('postal_code');
            $table->string('country');
            $table->string('shipping_type');
            $table->longText('delivery_desc');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('shop_customers')->onDelete('cascade');
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
