<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date('today_date');
            $table->integer('product_id');
            $table->integer('supplier_id');
            $table->integer('pmethod_id');
            $table->text('note')->nullable();
            $table->string('invoice_name')->nullable();
            $table->string('reference_no');
            $table->string('add_product');
            $table->integer('quantity')->default(1);
            $table->integer('available')->nullable();
            $table->decimal('cost')->default(0.00);
            $table->decimal('subtotal')->nullable();
            $table->decimal('instant_commisition')->default(0.00);
            $table->decimal('monthly_commisition')->default(0.00);
            $table->decimal('yearly_commisition')->default(0.00);
            $table->decimal('transport_commisition')->default(0.00);
            $table->decimal('extra_one_commisition')->default(0.00);
            $table->decimal('extra_two_commisition')->default(0.00);
            $table->decimal('payable_amount')->default(0.00);
            $table->decimal('paid_amount')->default(0.00);
            $table->decimal('due_paid')->default(0.00);
            $table->decimal('due')->default(0.00);
            $table->decimal('return_amount')->default(0.00);
            $table->decimal('balance')->default(0.00);
           
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
        Schema::dropIfExists('purchases');
    }
}
