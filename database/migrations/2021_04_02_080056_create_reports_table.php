<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('cash_fund_id');
            $table->foreignId('user_id');
            $table->date('startDate');
            $table->date('endDate');
            $table->timestamps();
            $table->softDeletes();

            // Foreing Key
            // $table->foreign('cash_fund_id')->references('id')->on('cash_funds')->onDelete('cascade');;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
