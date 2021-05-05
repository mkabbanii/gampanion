<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('balance');
            $table->integer('previous_balance')->nullable();
            $table->integer('last_added_amount')->nullable();
            $table->integer('last_deduct_amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
