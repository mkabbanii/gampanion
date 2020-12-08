<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAnnouncementsTable extends Migration
{
    public function up()
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_2470978')->references('id')->on('users');
        });
    }
}
