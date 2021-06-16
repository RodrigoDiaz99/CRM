<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->integer('total_count');
            $table->double('purchase_price');
            $table->double('percent_of_profit');
            $table->double('sale_price');
            $table->double('cost_of_shipping');
            $table->timestamps();
            $table->softDeletes();

            // Foreing Keys
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventoy_products');
    }
}
