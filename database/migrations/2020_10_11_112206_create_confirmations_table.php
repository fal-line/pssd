<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->string('account_number');
            $table->string('account_holder');
            $table->string('amount');
            $table->unsignedBigInteger('to_bank');
            $table->unsignedBigInteger('employe_id')->nullable();
            $table->date('date');
            $table->string('status');
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
        Schema::dropIfExists('confirmation');
    }
}
