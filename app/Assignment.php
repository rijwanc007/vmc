<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
   protected $fillable = [
       'task',
       'point',
       'time',
       'status',
       'employee_name',
       'employee_email',
       'employee_id',
   ];
   protected $table = 'assignments';
}
