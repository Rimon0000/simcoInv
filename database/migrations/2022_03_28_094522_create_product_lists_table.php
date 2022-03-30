<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_lists', function (Blueprint $table) {
            $table->id();

            $table->string('product_id')->unique();
            $table->string('title')->unique();
            $table->integer('price');
            $table->integer('sale_price');
            $table->integer('discount_price')->nullable();
            $table->integer('discount_percent')->nullable();
            $table->integer('category');
            $table->integer('sub_category')->nullable();
            $table->integer('sub_sub_category')->nullable();
            $table->string('brand');
            $table->string('display_section')->nullable();
            $table->string('origin')->nullable();
            $table->integer('variation_swatch')->default(0);
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('pcs')->nullable();
            $table->string('weight')->nullable();
            $table->integer('unit')->default(0);
            $table->integer('stock')->nullable();
            $table->integer('alert_stock')->nullable();
            $table->string('bar_code')->nullable();
            $table->integer('tax')->nullable();
            $table->text('tags')->nullable();
            $table->text('promotion')->nullable();
            $table->string('product_img')->nullable();
            $table->string('product_alt')->nullable();
            $table->string('warranty')->nullable();
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
        Schema::dropIfExists('product_lists');
    }
}
