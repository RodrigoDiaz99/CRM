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
            $table->id();
            $table->string('name');
            $table->string('img_paths');
            $table->string('description');
             $table->string('Color1')->nullable();
             $table->string('color2')->nullable();
             $table->string('color3')->nullable();
             $table->string('color4')->nullable();
             $table->string('color5')->nullable();

             $table->string('talla1')->nullable();
             $table->string('talla2')->nullable();
             $table->string('talla3')->nullable();
             $table->string('talla4')->nullable();
             $table->string('talla5')->nullable();

            $table->foreignId('category_id')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

            // Foreing Keys
            $table->foreign('category_id')->references('id')->on('category_products');
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
