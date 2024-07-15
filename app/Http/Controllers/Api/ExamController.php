<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExamResource;
use App\Models\Exam;
use Barryvdh\Reflection\DocBlock\Type\Collection;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function popularExams(){
        $popularExams=Exam::withCount('users')
            ->orderBy('users_count', 'desc')
            ->get();

        return ExamResource::collection($popularExams);
    }

    public function showExam($examId){
        $exam=Exam::find($examId);
        if($exam){
            return new ExamResource($exam);
        }else{
            return response()->json([
                'message'=>'the exam not found'
            ],404);
        }
    }
}
