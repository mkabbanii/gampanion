<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemStringsTable extends Migration
{
    public function up()
    {
        Schema::create('system_strings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
