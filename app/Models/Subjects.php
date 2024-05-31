<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = "subjects";
    protected $fillable = [
        "course_name",
        "branch_name",
        "semester",
        "subject"
    ];

    public $timestamps = false;

    public function papers()
    {
        return $this->hasMany(Papers::class, 'subject', 'subject');
    }
}
