<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TrackCompleteAssignment extends Model
{
    use softDeletes;
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
    protected $table = 'track_complete_assignments';
}
