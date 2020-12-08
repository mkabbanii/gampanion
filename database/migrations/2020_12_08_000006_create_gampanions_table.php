<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGampanionsTable extends Migration
{
    public function up()
    {
        Schema::create('gampanions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cost');
            $table->string('level')->nullable();
            $table->string('server')->nullable();
            $table->string('platform')->nullable();
            $table->boolean('availability')->default(0)->nullable();
            $table->integer('discount')->nullable();
            $table->string('other_game')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
