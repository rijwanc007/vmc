<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
      'name',
      'email',
      'phone',
      'message',
      'day',
      'month',
      'year',
      'time',
      'approve_status'
    ];
    protected $table = 'appointments';
}
