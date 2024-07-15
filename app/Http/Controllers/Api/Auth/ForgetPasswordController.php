<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ForgetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Otp;

class ForgetPasswordController extends Controller
{
    private $otp;
    public function __construct() {
        $this->otp=new Otp;
    }

    public function ForgetPassword(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email|exists:users,email',
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],404);
        }

        $user=User::where('email',$request->email)->first();

        $user->notify(new ForgetPasswordNotification());

        return response()->json([
            'message'=>'send code successfully'
        ],201);
    }

    
}
