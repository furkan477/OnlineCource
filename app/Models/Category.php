<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        "name",
        "cat_ust",
        "description",
    ];

    public function underCategory()
    {
        return $this->hasMany(Category::class,"cat_ust","id");
    }

    public function cources()
    {
        return $this->hasMany(Cource::class,"category_id","id");
    }
}
