<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('points');
            $table->integer('cash_amount')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
