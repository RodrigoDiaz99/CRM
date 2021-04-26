<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id('folio');
            $table->foreignId('user_id');
            $table->double('expense');
            // $table->foreignId('report_id');
            $table->timestamps();
            $table->softDeletes();
            
            // Foreing Key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
