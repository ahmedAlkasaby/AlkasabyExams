<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        $students=User::withCount('exams')
        ->orderBy('exams_count', 'desc')
        ->paginate(5);

    return view('admin.students.index',compact('students'));
    }

    public function show($studentId){
        $student=User::find($studentId);
        $pivotRecords=DB::table('exam_user')->where('user_id',$studentId)->get();
        $examsStudent=$student->exams;
        $student=User::find($studentId);
        return view('admin.students.showExams',compact('examsStudent'),compact('student'));
    }

    public function delete($studentId){
        try{
            DB::table('exam_user')->where('user_id',$studentId)->delete();
            User::where('id',$studentId)->delete();
            session()->flash('studentDelete','Delete Student Successfully');
            return back();

        }catch(Exception $e){
            session()->flash('NotDeleteStudent','cant delete this student');
        }
    }


    public function deleteExamStudent($examId,$studentId){
        $exam=Exam::find($examId);
        $student=User::find($studentId);
        DB::table('exam_user')
        ->where('user_id',$studentId)
        ->where('exam_id',$examId)
        ->delete();

        session()->flash('deleteExamStudent','Delete Exam '.json_decode($exam->name)->en .'Of Student '. $student->name  );

        return back();

    }


}
