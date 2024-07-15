<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExamResource;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function startExam(Request $request,$examId){
        $exam=Exam::find($examId);
        if($exam){
            $access_token=$request->header('access_token');
            $user=User::where('access_token',$access_token)->first();
            DB::table('exam_user')->insert([
                'user_id' =>$user->id,
                'exam_id'=>$examId,
                'satus'=>'close'
            ]);

            $exam=Exam::with('questionsExam')->find($examId);

            return new ExamResource($exam);
        }else{
            return response()->json([
                'message'=>'The Exam Not Found'
            ]);
        }


    }

    public function submitExam(Request $request ,$examId){
        $exam=Exam::find($examId);
        if($exam){
            $validator=Validator::make($request->all(),[
                'ans'=>'array',
                'ans.*'=>'in:1,2,3,4'
            ]);

            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()],404);
            }
            $access_token=$request->header('access_token');
            $user=User::where('access_token',$access_token)->first();



            $exam=Exam::find($examId);

            $questions=$exam->questionsExam;
            $points=0;
            foreach ($questions as $question) {
                if(isset($request->ans[$question->id])){
                    if($request->ans[$question->id]==$question->correct_anscer){
                        $points++;
                    }
                }
            }


            $pivoteRecord=DB::table('exam_user')
            ->where('user_id',$user->id)
            ->where('exam_id',$examId)
            ->first();

            $endExam=Carbon::now();

            $startExam=$pivoteRecord->created_at;

            $durationOfExam=$endExam->diffInMinutes($startExam);

            // dd($durationOfExam);

            // if($durationOfExam > $exam->duration_minates){
            //     DB::table('exam_user')
            //     ->where('user_id',$user->id)
            //     ->where('exam_id',$examId)
            //     ->update([
            //         'result'=>0,
            //         'duration_min'=>$durationOfExam
            //     ]);

            //     return response()->json([
            //     'result'=>0,
            //     'reson'=>' لانك سلمت بعد الوقت '
            // ]);

            // }

            $result=($points/$question->count())*100;

            DB::table('exam_user')
            ->where('user_id',$user->id)
            ->where('exam_id',$examId)
            ->update([
                'result'=>$result,
                'duration_min'=>$durationOfExam
            ]);

            return response()->json([
                'message'=>'the Exam Submit Successfully',
                'score'=>$result
            ]);
        }else{
            return response()->json([
                'message'=>'The Exam Not Found'
            ]);
        }
    }

}
