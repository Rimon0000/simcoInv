<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();



            $table->string('customer_id');
            $table->string('customer_name');
            $table->text('present_address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('office_phone')->nullable();
            $table->double('previous_due')->nullable();
            $table->double('credit_limit')->nullable();
            $table->integer('customer_type');
            $table->string('email')->nullable();
            $table->string('area')->nullable();
            $table->string('customer_img')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
