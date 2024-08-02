<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Exam;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function popularExams(){

        $exams=new Exam();

        // $popularExams=Exam::withCount('users')
        //     ->orderBy('users_count', 'desc')
        //     ->get();
        $lang=App::getLocale();
        return view('website.home',[
            'popularExams'=>$exams->mostExams(),
            'lang'=>$lang
        ]);
    }



    public function category($slug){
        $category=Category::where('slug',$slug)->first();

        $skills=Skill::where('category_id',$category->id)->paginate(3);

        $categories=Category::get();

        return view('website.category',[
            'categories'=>$categories,
            'skills'=>$skills,
            'category'=>$category
        ]);
    }

    public function skill($slug){
        $skill=Skill::where('slug',$slug)->first();
        $exams=Exam::where('skill_id',$skill->id)->paginate(3);
        return view('website.skills',[
            'skill'=>$skill,
            'exams'=>$exams
        ]);
    }


    public function exam($slug){
        $exam=Exam::where('slug',$slug)->first();

        $user=Auth::user();
        $pivoteRecord=null;
        if(auth()->user()){
            $pivoteRecord=DB::table('exam_user')->where('user_id',$user->id)->where('exam_id',$exam->id)->first();
        }

        return view('website.exam',[
            'exam'=>$exam,
            'pivoteRecord'=>$pivoteRecord
        ]);
    }

    public function questions(Request $request, $exam_slug){

        $exam=Exam::where('slug',$exam_slug)->first();
        $questions=$exam->questionsExam;
        $user=Auth::user();

        $records=DB::table('exam_user')->where('user_id',$user->id)->get();
        if($records){
            foreach ($records as $record) {
                if($record->exam_id==$exam->id && $record->satus=='close'){
                    abort('403');
                }
            }
        }



        DB::table('exam_user')->insert([
            'user_id' =>auth()->user()->id,
            'exam_id'=>$exam->id,
            'satus'=>'close'
        ]);

        $pivoteRecord=DB::table('exam_user')->where('user_id',$user->id)->where('exam_id',$exam->id)->first();

        return view('website.ExamQuestions',[
            'exam'=>$exam,
            'questions'=>$questions,
        ]);

    }

    public function submitExam( Request $request ,$slug ){
        $request->validate([
            'ans'=>'array',
            // 'ans.*'=>'required|in:1,2,3,4'
        ]);
        $exam=Exam::where('slug',$slug)->first();
        $questions=$exam->questionsExam;

        $points=0;

        foreach ($questions as $question) {
            if(isset($request->ans[$question->id])){
                $correct_ans=$question->correct_anscer;
                $user_ans=$request->ans[$question->id];
                if($correct_ans == $user_ans){
                     $points++;
                }
            }
        }

        $user=Auth::user();
        $pivoteRecord=$user->exams()->where('exam_id',$exam->id)->first();

        $startExam=$pivoteRecord->pivot->created_at;

        $endExam=Carbon::now();

        $durationOfExam=$endExam->diffInMinutes($startExam);

        $result=($points/$questions->count())*100;
        if($durationOfExam > $exam->duration_minates){
            $user->exams()->updateExistingPivot($exam->id,[
                'result'=>0,
                'duration_min'=>$durationOfExam
            ]);
        }

        $user->exams()->updateExistingPivot($exam->id,[
            'result'=>$result,
            'duration_min'=>$durationOfExam
        ]);

        session()->flash('message','successfully of exam the result '.$result);



        return redirect()->route('exam',['slug'=>$exam->slug]);



    }
}
