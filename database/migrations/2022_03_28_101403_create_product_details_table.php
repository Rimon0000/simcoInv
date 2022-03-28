<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();

            $table->integer('product_id');
            $table->text('short_details');
            $table->text('long_details');
            $table->text('faq')->nullable();
            $table->text('warranty_policy')->nullable();

            $table->string('product_img_1')->nullable();
            $table->string('product_img_2')->nullable();
            $table->string('product_img_3')->nullable();
            $table->string('product_img_4')->nullable();
            $table->string('product_alt_1')->nullable();
            $table->string('product_alt_2')->nullable();
            $table->string('product_alt_3')->nullable();
            $table->string('product_alt_4')->nullable();

            $table->integer('status')->default(1);
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
        Schema::dropIfExists('product_details');
    }
}