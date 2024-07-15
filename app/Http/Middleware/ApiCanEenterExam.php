<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ApiCanEenterExam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $access_token=$request->header('access_token');
        $user=User::where('access_token',$access_token)->first();
        $examId=$request->route()->parameter('ExamId');

        $pivoteRecord=DB::table('exam_user')->where('user_id',$user->id)->where('exam_id',$examId)->first();

        if($pivoteRecord==null || $pivoteRecord->satus=='open'){
            return $next($request);
        }else{
            return response()->json([
                'message'=>'غير مسموحلك دخول هدا الامتحان'
            ]);
        }

    }
}
