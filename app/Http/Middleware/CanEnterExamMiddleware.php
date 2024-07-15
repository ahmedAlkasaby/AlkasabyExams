<?php

namespace App\Http\Middleware;

use App\Models\Exam;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CanEnterExamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $examSlug=$request->route()->parameter('slug');
        $exam=Exam::where('slug',$examSlug)->first();
        $user=Auth::user();
        $pivoteRecord=DB::table('exam_user')->where('user_id',$user->id)->where('exam_id',$exam->id)->first();
        if($pivoteRecord ){
            if($pivoteRecord->satus== 'close'){
                return redirect()->route('exam',['slug'=>$exam->slug]);
            }
        }

        return $next($request);
    }
}
