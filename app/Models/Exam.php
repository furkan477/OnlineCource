<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title', 'description', 'cource_id'];

    public function cources()
    {
        return $this->belongsTo(Cource::class,'cource_id','id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class,'exam_id','id');
    }

    public function examresults()
    {
        return $this->hasMany(ExamResult::class,'exam_id','id');
    }

}
