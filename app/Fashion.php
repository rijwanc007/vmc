<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fashion extends Model
{
    protected $fillable = [
        'image',
        'type',
    ];
    protected $table = 'fashions';
}
