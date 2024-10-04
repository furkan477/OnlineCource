<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $fillable = ['score', 'user_id', 'exam_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function exams()
    {
        return $this->belongsTo(Exam::class,'exam_id','id');
    }

    public function certifica()
    {
        return $this->hasOne(Certifica::class,'examresult_id','id');
    }
}
