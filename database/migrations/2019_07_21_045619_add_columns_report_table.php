<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('track_id')->nullable()->after('id');
            $table->string('employee_id')->nullable()->after('track_id');
            $table->string('assignment_id')->nullable()->after('employee_id');
            $table->string('employee_name')->nullable()->after('assignment_id');
            $table->string('employee_email')->nullable()->after('employee_name');
            $table->string('total_point')->nullable()->after('employee_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report', function (Blueprint $table) {
            //
        });
    }
}
