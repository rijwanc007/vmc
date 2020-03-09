<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCompleteAssignment extends Model
{
    protected $fillable = [
        'task',
        'point',
        'time',
        'status',
        'assign_date',
        'employee_name',
        'employee_email',
        'employee_id',
        'assignment_id',
        'admin_status',
        'gain_point',
    ];
    protected $table = 'employee_complete_assignments';
}
