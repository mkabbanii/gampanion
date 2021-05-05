<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment')->nullable();
            $table->float('user_rate_value', 2, 1)->nullable();
            $table->integer('is_recommend')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
