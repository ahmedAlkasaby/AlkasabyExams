<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable=[
        'name',
        'image',
        'category_id',
        'slug'
    ];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
