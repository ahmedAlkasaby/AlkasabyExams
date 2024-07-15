<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\RegisterMail;
use App\Notifications\VerfyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users|max:255|string',
            'password'=>'required|confirmed|min:8|string'
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],404);
        }

        $access_token=Str::random(64);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'access_token'=>$access_token
        ]);

        $user->notify(new VerfyEmail());

        return response()->json([
            'access_token'=>$user->access_token,
            'user'=>$user->name
        ],201);
    }


    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:8'
        ]);

        if($validator->fails()){
            return response()->json([
                'errors'=>$validator->errors()
            ],404);
        }


        $user=User::where('email',$request->email)->first();
        if($user){
            $password_correct=Hash::check($request->password,$user->password);
            if($password_correct){
                $access_token=Str::random(64);
                User::where('id',$user->id)->update([
                    'access_token'=>$access_token
                ]);
                $user_updated=User::find($user->id);
                return response()->json([
                    'message'=>'login successfully',
                    'user'=>$user->name,
                    'access_token'=>$user_updated->access_token
                ],201);


            }else{
                return response()->json([
                    'message'=>'The Password not correct'
                ]);
            }
        }else{
            return response()->json([
                'message'=>'حدث شي خطا اثنا تسجيل الدخول'
            ]);
        }
    }

    public function logout(Request $request){
        $access_token=$request->header('access_token');
        User::where('access_token',$access_token)->update([
            'access_token'=>null
        ]);

        return response()->json([
            'message'=>'تم تسجيل الخروج بنجاح'
        ]);
    }
}
