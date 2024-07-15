<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class Exam extends Model
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
    use HasFactory;


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

    // public function examStatus(){
    //     $record=DB::table('exam_user')->where('user_id',auth()->user()->id)->where('exam_id',$this->id)->first();
    //     return $record->status;
    // }
}
