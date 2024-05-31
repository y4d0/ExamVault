<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    protected $table = 'schools';
    protected $fillable = [
        'school_name'
    ];

    public $timestamps = false;
}
