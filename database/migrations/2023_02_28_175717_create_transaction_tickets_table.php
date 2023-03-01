<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('number', 16);
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->tinyInteger('payment_status');
            $table->string('snaptoken', 36)->nullable();
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
        Schema::dropIfExists('transaction_tickets');
    }
}
