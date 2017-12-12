<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_cart_product', function(Blueprint $table){
            $table->increments('id');
            $table->integer('shop_cart_id');
            $table->string('product_variation_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('modified_by');
            $table->string('product_name');
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
        Schema::drop('shop_cart_product');
    }
}
