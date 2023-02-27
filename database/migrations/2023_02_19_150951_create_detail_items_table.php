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
            $table->integer('machine_capacity');
            $table->tinyInteger('transmission');
            $table->string('police_number');
            $table->string('chassis_number');
            $table->string('machine_number');
            $table->integer('kilometers');
            $table->string('fuel');
            $table->string('physical_color');
            $table->tinyInteger('vehicle_registration');
            $table->date('vehicle_registration_date');
            $table->tinyInteger('book_vehicle_owner');
            $table->tinyInteger('invoice');
            $table->tinyInteger('receipt');
            $table->tinyInteger('owner_identity');
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
