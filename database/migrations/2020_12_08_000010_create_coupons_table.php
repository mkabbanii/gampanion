<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->integer('points');
            $table->string('is_valid')->nullable();
            $table->datetime('end_date');
            $table->integer('quantity');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
