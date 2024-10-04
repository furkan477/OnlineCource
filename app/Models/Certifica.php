<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certifica extends Model
{
    protected $fillable = [
        'user_id',
        'cource_id',
        'certifica',
        'examresult_id',
    ];

    public function cources()
    {
        return $this->belongsTo(Cource::class,'cource_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function examresults()
    {
        return $this->belongsTo(ExamResult::class,'examresult_id','id');
    }
}
