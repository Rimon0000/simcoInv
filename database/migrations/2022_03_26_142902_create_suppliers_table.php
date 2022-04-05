<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->string('supplier_id');
            $table->string('supplier_name');
            $table->string('owner_name')->nullable();
            $table->text('present_address')->nullable();
            $table->string('contact');
            $table->string('whatsapp')->nullable();
            $table->double('previous_due')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('supplier_img')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
