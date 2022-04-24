<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            $table->string('offer_name')->unique();
            $table->string('product_id')->nullable();
            $table->string('coupon_code');
            $table->string('coupon_type');
            $table->string('coupon_limit');
            $table->string('coupon_amount');
            $table->string('cart_min_value');
            $table->string('expired_date');
            $table->string('coupon_use')->default(0);
            $table->string('coupon_use_date')->nullable();
            $table->string('coupon_used_by')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
