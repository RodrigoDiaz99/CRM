<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('street');
            $table->string('number_exterior');
            $table->string('number_interior')->nullable();
            $table->string('suburb');
            $table->string('zip');
            $table->string('reference');
            $table->timestamps();
            $table->softDeletes();

            // Foreing Keys


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_data');
    }
}
