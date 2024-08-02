<?php

namespace App\Http\Middleware;

use App\Models\Exam;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ApiSubmitExamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=Auth::guard('api')->user();
        $examId=$request->route()->parameter('ExamId');
        $exam=Exam::find($examId);
        if($exam){
        $pivoteRecord=DB::table('exam_user')->where('user_id',$user->id)->where('exam_id',$examId)->first();
        if($pivoteRecord->result==null){
            return $next($request);

        }else{
            return response()->json([
                'message'=>'تم ارسال الامتحان من قبل'
            ]);
        }

        }else{
            return response()->json([
                'message'=>'the exam not found'
            ]);
        }


    }
}
