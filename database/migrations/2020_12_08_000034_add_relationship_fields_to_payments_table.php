<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('user_id');
            $table->foreign('user_id', 'user_fk_2470327')->references('id')->on('users');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id', 'status_fk_2470333')->references('id')->on('statuses');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_2470403')->references('id')->on('payment_methods');
        });
    }
}
