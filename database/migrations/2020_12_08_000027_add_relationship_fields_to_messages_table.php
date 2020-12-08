<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id', 'sender_fk_2506199')->references('id')->on('users');
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id', 'receiver_fk_2506200')->references('id')->on('users');
        });
    }
}
