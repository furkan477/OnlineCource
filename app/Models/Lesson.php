<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'content',
        'cource_id',
    ];

    public function cources(){
        return $this->belongsTo(Cource::class,'cource_id','id');
    }
}
