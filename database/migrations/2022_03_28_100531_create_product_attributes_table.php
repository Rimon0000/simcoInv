<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();

            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('alert_stock');
            $table->integer('unit_id');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('piece')->nullable();
            $table->string('weight')->nullable();
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->integer('discount_percent')->nullable();
            $table->string('product_img_1')->nullable();
            $table->string('product_img_2')->nullable();
            $table->string('product_img_alt_1')->nullable();
            $table->string('product_img_alt_2')->nullable();
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
        Schema::dropIfExists('product_attributes');
    }
}
