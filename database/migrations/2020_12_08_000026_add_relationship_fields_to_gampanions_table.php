<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGampanionsTable extends Migration
{
    public function up()
    {
        Schema::table('gampanions', function (Blueprint $table) {
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id', 'game_fk_2732531')->references('id')->on('games');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_2732532')->references('id')->on('users');
        });
    }
}
