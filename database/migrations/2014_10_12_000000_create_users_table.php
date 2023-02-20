<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_district_id')->nullable();
            $table->foreignId('bank_account_id')->nullable();
            $table->string('uuid');
            $table->integer('nik')->nullable();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('full_address')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('image')->nullable();
            $table->string('id_card_image')->nullable();
            $table->tinyInteger('is_complete')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
