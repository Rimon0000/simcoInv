<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();

            $table->date('invoice_date');
            $table->string('invoice_no');
            $table->integer('customer_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->integer('cat_id');
            $table->integer('unit_id');
            $table->double('unit_price');
            $table->integer('quantity');
            $table->double('total_price');
            $table->integer('paid_status')->nullable();
            $table->integer('discount_price')->nullable();
            $table->double('paid_amount')->nullable();

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
        Schema::dropIfExists('invoice_details');
    }
}
