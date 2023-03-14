<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_items', function (Blueprint $table) {
            $table->id();
            $table->integer('machine_capacity')->nullable();
            $table->tinyInteger('transmission')->nullable();
            $table->string('police_number')->nullable();
            $table->string('chassis_number')->nullable();
            $table->string('machine_number')->nullable();
            $table->integer('kilometers')->nullable();
            $table->string('fuel')->nullable();
            $table->string('physical_color');
            $table->tinyInteger('vehicle_registration')->nullable();
            $table->date('vehicle_registration_date')->nullable();
            $table->tinyInteger('book_vehicle_owner')->nullable();
            $table->tinyInteger('invoice');
            $table->tinyInteger('receipt');
            $table->tinyInteger('owner_identity')->nullable();
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
        Schema::dropIfExists('detail_items');
    }
}
