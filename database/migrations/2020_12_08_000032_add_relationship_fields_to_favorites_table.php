<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFavoritesTable extends Migration
{
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->string('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2470411')->references('id')->on('users');
            $table->unsignedBigInteger('favorite_user_id')->nullable();
            $table->foreign('favorite_user_id', 'favorite_user_fk_2470412')->references('id')->on('users');
        });
    }
}
