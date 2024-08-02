<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends BaseModel
{
    // protected $fillable=[
    //     'head_of_question',
    //     'choice_1',
    //     'choice_2',
    //     'choice_3',
    //     'choice_4',
    //     'correct_anscer',
    //     'exam_id'
    // ];
    // use HasFactory;

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
