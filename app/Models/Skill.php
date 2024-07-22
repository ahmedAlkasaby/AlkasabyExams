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

    public function scopeFilter($query ,array $filter){
        $query->when($filter['search'] ?? false ,function($query,$search){
            $query
            ->where('name','like','%'.$search.'%')
            ->orWhere('slug','like','%'.$search.'%')
            ->get();
        });

        $query->when($filter['category'] ?? false ,function($query ,$category_id){
            $query
            ->where('category_id',$category_id)
            ->get();
        });
    }
}
