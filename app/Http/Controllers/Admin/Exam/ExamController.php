<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Events\AdExamEvent;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Skill;
use App\Models\User;
use App\Notifications\addExamMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    public function index(){

        $exams=Exam::latest()->filter(request(['search','skill']))->paginate(5);
        $skills=Skill::all();
        return view('admin.exams.index',[
            'exams'=>$exams,
            'skills'=>$skills
        ]);
    }

    public function show($exam_id){
        $exam=Exam::find($exam_id);
        return view('admin.exams.show',[
            'exam'=>$exam
        ]);
    }

    public function create(){
        $skills=Skill::get();

        return view('admin.exams.create',[
            'skills'=>$skills
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name_ar'=>'required|string',
            'name_en'=>'required|string',
            'skill_id'=>'required|exists:skills,id',
            'image'=>'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'difficulty'=>'required|numeric|in:1,2,3,4,5',
            'duration_minates'=>'required|numeric',
            'questions'=>'required|numeric|min:1',
        ]);


        $slug=Str::of($request->name_en)->slug('-').uniqid();


        $image=Storage::putFile('exams',$request->file('image'));

        $exam=Exam::create([
            'name'=>json_encode([
                'ar'=>$request->name_ar,
                'en'=>$request->name_en
            ]),
            'slug'=>$slug,
            'image'=>$image,
            'skill_id'=>$request->skill_id,
            'difficulty'=>$request->difficulty,
            'duration_minates'=>$request->duration_minates,
            'questions'=>$request->questions

        ]);
        session()->flash('ExamCreate','Create Exam Successfully');

        return redirect()->route('createQuestions',['id'=>$exam->id]);
    }

    public function edit($id){
        $exam=Exam::find($id);
        $skills=Skill::get();

        return view('admin.exams.edit',[
            'exam'=>$exam,
            'skills'=>$skills
        ]);
    }

    public function update(Request $request ,$id){
        $request->validate([
            'name_ar'=>'required|string',
            'name_en'=>'required|string',
            'skill_id'=>'required|exists:skills,id',
            'image'=>'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'difficulty'=>'required|numeric|in:1,2,3,4,5',
            'duration_minates'=>'required|numeric',
            'questions'=>'required|numeric|min:1',
        ]);


        $slug=Str::of($request->name_en)->slug('-').uniqid();

        $exam=Exam::find($id);
        if($request->hasFile('image')){
            $image=Storage::putFile('skills',$request->file('image'));
        }else{
            $image=$exam->image;
        }

        Exam::where('id',$id)->update([
            'name'=>json_encode([
                'ar'=>$request->name_ar,
                'en'=>$request->name_en
            ]),
            'slug'=>$slug,
            'image'=>$image,
            'skill_id'=>$request->skill_id,
            'difficulty'=>$request->difficulty,
            'duration_minates'=>$request->duration_minates,
            'questions'=>$request->questions

        ]);
        session()->flash('ExamEdit','Edit Exam Successfully');
        return redirect()->route('allExams');
    }

    public function delete($id){
        try{
            Question::where('exam_id',$id)->delete();
            Exam::where('id',$id)->delete();
            session()->flash('examDelete','Delete Exam Successfully');
            return back();
        }catch(Exception $e){
             session()->flash('CantDeleteExam','هناك مستخدمين حلو الامتحان');
             return back();
        }
    }

    public function craeteQuestions($exam_id){
        $exam=Exam::find($exam_id);
        return view('admin.exams.questions.create',compact('exam'));
    }

    public function storeQuestions(Request $request ,$exam_id){
        $request->validate([
            'head_of_question'=>'array|required',
            'head_of_question.*'=>'required|string',
            'choice_1'=>'array|required',
            'choice_1.*'=>'required|string',
            'choice_2'=>'array|required',
            'choice_2.*'=>'required|string',
            'choice_3'=>'array|required',
            'choice_3.*'=>'required|string',
            'choice_4'=>'array|required',
            'choice_4.*'=>'required|string',
            'correct_anscer'=>'array|required',
            'correct_anscer.*'=>'required|in:1,2,3,4'
        ]);

        $exam=Exam::find($exam_id);

        for ($i=0; $i < $exam->questions; $i++) {
            Question::create([
                'exam_id'=>$exam_id,
                'head_of_question'=>$request->head_of_question[$i],
                'choice_1'=>$request->choice_1[$i],
                'choice_2'=>$request->choice_2[$i],
                'choice_3'=>$request->choice_3[$i],
                'choice_4'=>$request->choice_4[$i],
                'correct_anscer'=>$request->correct_anscer[$i]
            ]);
        }



        session()->flash('createQuestions','Create Questions Successfully');
        $users=User::where('id','>=',73)->get();
        $exam=Exam::find($exam_id);

        foreach ($users as $user) {
            $user->notify(new addExamMail($exam->slug));
        }

        // $users->notify(new addExamMail($exam_id));

        // event(new AdExamEvent);
        return redirect()->route('allExams');

    }


}
