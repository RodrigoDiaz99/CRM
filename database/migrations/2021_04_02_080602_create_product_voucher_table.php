<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_voucher', function (Blueprint $table) {
            $table->foreignId('product_id');
            $table->foreignId('voucher_id');
            $table->integer('amount');
            $table->timestamps();
            $table->softDeletes();

            // Foreing Key
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('voucher_id')->references('folio')->on('vouchers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_voucher');
    }
}
