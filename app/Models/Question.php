<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question','exam_id'];

    public function exams()
    {
        return $this->belongsTo(Exam::class,'exam_id','id');
    }

    public function choices()
    {
        return $this->hasMany(Choice::class,'question_id','id');
    }
}
