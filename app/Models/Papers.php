<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Papers extends Model
{
    protected $table='papers';
    protected $fillable = [
        'subject',
        'examination',
        'year',
        'question_paper',
        'answer_paper'
    ];

    public $timestamps = false;

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject', 'subject');
    }
}
