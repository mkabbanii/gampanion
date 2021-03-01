<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('game_id')->nullable();
            $table->foreign('game_id', 'game_fk_2466878')->references('id')->on('games');
            $table->string('user_id');
            $table->foreign('user_id', 'user_fk_2466879')->references('id')->on('users');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id', 'status_fk_2470216')->references('id')->on('statuses');
            $table->unsignedBigInteger('gampanion_id');
            $table->foreign('gampanion_id', 'gampanion_fk_2733018')->references('id')->on('gampanions');
        });
    }
}
