<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ['choice', 'question_id', 'is_correct'];

    public function questions()
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }
}
