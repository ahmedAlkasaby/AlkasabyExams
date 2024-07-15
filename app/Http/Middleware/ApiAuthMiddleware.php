<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $access_token=$request->header('access_token');

        if($access_token){
            $user=User::where('access_token',$access_token)->first();
            // dd($user);

            if($user){
                return $next($request);
            }else{
                return response()->json([
                    'message'=>'حدث شي خطا اثناء تسجيل الدخول'
                ],404);
            }
        }else{
            return response()->json([
                'message'=>'انت لست مسجل دخول'
            ],404);
        }
    }
}
