<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRedemptionsTable extends Migration
{
    public function up()
    {
        Schema::table('redemptions', function (Blueprint $table) {
            $table->unsignedBigInteger('coupon_id');
            $table->foreign('coupon_id', 'coupon_fk_2470845')->references('id')->on('coupons');
            $table->string('user_id');
            $table->foreign('user_id', 'user_fk_2470846')->references('id')->on('users');
        });
    }
}
