<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsColoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_colores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('colores_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('colores_id')->references('id')->on('colores');
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
        Schema::dropIfExists('products_colores');
    }
}
