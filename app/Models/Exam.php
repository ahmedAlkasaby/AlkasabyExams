<?php

namespace App\Models;

use function PHPSTORM_META\map;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class Exam extends BaseModel
{
    protected $fillable=[
        'skill_id',
        'name',
        'image',
        'duration_minates',
        'difficulty',
        'questions',
        'slug'
    ];


    use Searchable;

    public function scopeFilter($query,array $filters){
        $query->when($filters['search'] ?? false ,function($query,$search){
            $query
            ->where('name','like','%'.$search.'%')
            ->get();
        });
        $query->when($filters['skill'] ?? false ,function($query,$skill_id){
            $query
            ->where('skill_id',$skill_id)
            ->get();
        });
    }

    public function name($lang = null){
        return $this->getTranslatedAttribute('name',$lang);
    }



    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function questionsExam()
    {
        return $this->hasMany(Question::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(
            'result',
                    'satus',
                    'duration_min',
                    'created_at'
        );
    }

    public function mostExams(){
        return $this->withCount('users')->orderBy('users_count','desc')->paginate(8);
    }


}
