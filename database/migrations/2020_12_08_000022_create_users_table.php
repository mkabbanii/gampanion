<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('phone')->nullable();
            $table->string('about')->nullable();
            $table->string('is_active')->nullable();
            $table->string('is_blocked')->nullable();
            $table->string('is_provider')->nullable();
            $table->datetime('phone_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->string('gps_location')->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->string('language')->nullable();
            $table->string('rank')->nullable();
            $table->datetime('become_provider_at')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('beneficial_name')->nullable();
            $table->string('full_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
