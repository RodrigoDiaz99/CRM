<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_tallas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('talla_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('talla_id')->references('id')->on('tallas');
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
        Schema::dropIfExists('products_tallas');
    }
}
