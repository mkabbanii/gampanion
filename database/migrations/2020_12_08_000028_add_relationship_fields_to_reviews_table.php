<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_2470219')->references('id')->on('users');
            $table->unsignedBigInteger('gampanion_id');
            $table->foreign('gampanion_id', 'gampanion_fk_2732637')->references('id')->on('gampanions');
        });
    }
}
