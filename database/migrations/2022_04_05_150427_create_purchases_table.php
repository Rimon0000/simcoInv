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

            $table->string('date');
            $table->string('purchase_no');
            $table->string('supplier_name');
            $table->string('category');
            $table->string('subcategory')->nullable();
            $table->string('product_code');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('description');
            $table->integer('total_price');
            $table->integer('sub_total_price');
            $table->integer('approved')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();

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
