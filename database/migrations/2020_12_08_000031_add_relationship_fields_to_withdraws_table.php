<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWithdrawsTable extends Migration
{
    public function up()
    {
        Schema::table('withdraws', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_2470795')->references('id')->on('users');
            $table->unsignedBigInteger('payment_method_id');
            $table->foreign('payment_method_id', 'payment_method_fk_2470798')->references('id')->on('payment_methods');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id', 'status_fk_2470801')->references('id')->on('statuses');
        });
    }
}
