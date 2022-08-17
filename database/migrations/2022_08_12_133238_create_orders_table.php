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
//        Schema::create('orders', function (Blueprint $table) {
//            $table->id();
//            $table->string('name');
//            $table->string('mobile');
//            $table->string('address')->nullable();
//            $table->string('email')->nullable();
//            $table->string('shipping_type');
//            $table->string('product');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('orders');
    }
}
