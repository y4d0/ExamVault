<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = "courses";
    protected $fillable = [
        "school_name",
        "course_name",
        "no_of_semesters"
    ];

    public $timestamps=false;

    public function subjects()
    {
        return $this->hasMany(Subjects::class, 'course_name', 'course_name');
    }
}
