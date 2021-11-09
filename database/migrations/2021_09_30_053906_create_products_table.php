<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('unit_id');
            $table->string('product_name');
            $table->string('product_code')->unique();
            $table->double('product_price');
            $table->integer('product_quantity')->default(0)->nullable();
            $table->string('product_image')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
