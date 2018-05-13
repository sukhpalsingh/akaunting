<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->date('transaction_at');
            $table->string('type')->nullable();
            $table->double('amount', 15, 4);
            $table->string('description')->nullable();
            $table->double('balance', 15, 4);
            $table->boolean('reconciled')->default(false);
            $table->string('record_type')->nullable();
            $table->unsignedInteger('record_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('account_id');
            $table->index('transaction_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
