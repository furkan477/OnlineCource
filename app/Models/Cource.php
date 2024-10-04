<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class,"category_id","id");
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class,"cource_id","id");
    }

    public function carts()
    {
        return $this->hasMany(Card::class,"cource_id","id");
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class,"cource_id","id");
    }

    public function exams()
    {
        return $this->hasOne(Exam::class,"cource_id","id");
    }

    public function certifica()
    {
        return $this->hasMany(Certifica::class,'cource_id','id');
    }
}
