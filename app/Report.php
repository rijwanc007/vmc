<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'track_id',
        'employee_id',
        'assignment_id',
        'employee_name',
        'employee_email',
        'total_point',
    ];
    protected $table = 'reports';
}
