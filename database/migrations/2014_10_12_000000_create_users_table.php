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
            $table->string('uuid');
            $table->bigInteger('nik')->nullable();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('gender')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->foreignId('sub_district_id')->nullable();
            $table->text('full_address')->nullable();
            $table->integer('postal_code')->nullable();
            $table->foreignId('bank_account_id')->nullable();
            $table->string('image')->nullable();
            $table->string('id_card_image')->nullable();
            $table->tinyInteger('is_complete')->default(0);
            $table->foreignId('role_id')->default(3);
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
