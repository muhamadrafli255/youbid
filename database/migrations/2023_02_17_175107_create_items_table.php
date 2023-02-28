<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_model_id');
            $table->foreignId('detail_item_id');
            $table->foreignId('grade_item_id')->nullable();
            $table->string('item_code')->unique();
            $table->string('name');
            $table->text('description');
            $table->foreignId('created_by');
            $table->foreignId('update_by')->nullable();
            $table->tinyInteger('is_auction')->default(0);
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
        Schema::dropIfExists('items');
    }
}
