<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount_deducted_from_user')->nullable();
            $table->integer('amount_earned_by_provider');
            $table->string('note')->nullable();
            $table->integer('quantity');
            $table->date('approved_at')->nullable();
            $table->date('rejected_at')->nullable();
            $table->datetime('proposed_time')->nullable();
            $table->string('request_note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
