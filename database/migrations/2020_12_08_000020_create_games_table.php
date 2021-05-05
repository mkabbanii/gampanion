<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('game_name');
            $table->string('game_info');
            $table->string('note')->nullable();
            $table->integer('is_featured')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
