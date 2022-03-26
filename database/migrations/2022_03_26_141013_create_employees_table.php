<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('emp_id');
            $table->string('nid')->nullable();
            $table->string('emp_name');
            $table->integer('designation');
            $table->integer('department')->nullable();
            $table->string('joint_date');
            $table->double('salary');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->integer('gender');
            $table->string('DOB')->nullable();
            $table->integer('marital')->nullable();
            $table->text('present_address');
            $table->text('permanent_address')->nullable();
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('emp_img')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
