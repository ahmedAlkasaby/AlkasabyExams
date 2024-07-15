<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VerfyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Otp;

class VerfiedController extends Controller
{
    private $otp;
    public function __construct() {
        $this->otp=new Otp;
    }

    public function resendCode(Request $request){
       
        $validator=Validator::make($request->all(),[
            'email'=>'required|email|exists:users,email',
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],404);
        }

        $user=User::where('email',$request->email)->first();

        $user->notify(new VerfyEmail());

        return response()->json([
            'message'=>'resend code successfully'
        ],201);


    }

    public function verfiedEmail(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email|exists:users,email',
            'code'=>'required'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],404);
        }

        $otp=$this->otp->validate($request->email,$request->code);

        if($otp->status==true){
            User::where('email',$request->email)->update([
                'email_verified_at'=>now()
            ]);
            return response()->json([
                'message'=>'the email verfied successfully'
            ]);
        }else{
            return response()->json([
                'status'=>'failed',
                'error'=>$otp->message,
            ],401);
        }
    }
}
