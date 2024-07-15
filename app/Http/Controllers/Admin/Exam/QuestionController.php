<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($examId){
        $exam=Exam::find($examId);
        $questions=Question::where('exam_id',$examId)->paginate(5);

        return view('admin.exams.questions.index',[
            'exam'=>$exam,
            'questions'=>$questions
        ]);
    }

    public function store(Request $request ,$examId){
        $request->validate([
            'head_of_question'=>'required|string',
            'choice_1'=>'required|string',
            'choice_2'=>'required|string',
            'choice_3'=>'required|string',
            'choice_4'=>'required|string',
            'correct_anscer'=>'required|in:1,2,3,4'
        ]);

        $exam=Exam::find($examId);

        Question::create([
            'exam_id'=>$examId,
            'head_of_question'=>$request->head_of_question,
            'choice_1'=>$request->choice_1,
            'choice_2'=>$request->choice_2,
            'choice_3'=>$request->choice_3,
            'choice_4'=>$request->choice_4,
            'correct_anscer'=>$request->correct_anscer
        ]);

        $numNewQuestions=$exam->questions +=1  ;
        Exam::where('id',$examId)->update([
            'questions'=>$numNewQuestions
        ]);

        session()->flash('questionCreate','create question in exam '.json_decode($exam->name)->en);
        return back();
    }

    public function update(Request $request ){
        $request->validate([
            'head_of_question'=>'required|string',
            'choice_1'=>'required|string',
            'choice_2'=>'required|string',
            'choice_3'=>'required|string',
            'choice_4'=>'required|string',
            'correct_anscer'=>'required|in:1,2,3,4'
        ]);

        $questionId=$request->id;

        $question=Question::find($questionId);
        $exam=$question->exam;



        Question::where('id',$questionId)->update([

            'head_of_question'=>$request->head_of_question,
            'choice_1'=>$request->choice_1,
            'choice_2'=>$request->choice_2,
            'choice_3'=>$request->choice_3,
            'choice_4'=>$request->choice_4,
            'correct_anscer'=>$request->correct_anscer
        ]);



        session()->flash('questionUpdate','Update question in exam '.json_decode($exam->name)->en);
        return back();
    }

    public function delete($questionId){
        try{
            Question::where('id',$questionId)->delete();
            session()->flash('questionDelete','Delete Question Successfully');
            return back();
        }catch(Exception $e){
             session()->flash('CantDeleteQuestion','هناك مستخدمين حلو الامتحان');
             return back();
        }
    }
}
