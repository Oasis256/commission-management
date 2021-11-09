<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->integer('pmethod_id');
            $table->integer('invoice_no');
            $table->integer('payable_amount')->default(0);
            $table->integer('paid_amount')->default(0);
            $table->integer('due')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('paid_due')->default(0);
            $table->integer('return')->default(0);
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
        Schema::dropIfExists('sells');
    }
}
