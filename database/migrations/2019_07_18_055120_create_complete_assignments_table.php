<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompleteAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complete_assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('task')->nullable();
            $table->string('time')->nullable();
            $table->string('point')->nullable();
            $table->string('status')->nullable();
            $table->string('assign_date')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('employee_email')->nullable();
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
        Schema::dropIfExists('complete_assignments');
    }
}
