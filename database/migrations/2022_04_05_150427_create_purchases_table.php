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

            $table->string('purchase_date');
            $table->string('purchase_no')->uniqid();
            $table->integer('supplier_id');
            $table->integer('cat_id');
            $table->integer('unit_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('product_attr_id')->nullable();
            $table->double('quantity');
            $table->double('unit_price');
            $table->double('total_price');
            $table->string('description')->nullable();
            $table->integer('approved')->default(0);

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
