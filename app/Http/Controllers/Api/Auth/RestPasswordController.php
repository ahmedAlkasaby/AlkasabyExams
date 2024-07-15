<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Otp;

class RestPasswordController extends Controller
{
    private $otp;
    public function __construct() {
        $this->otp=new Otp;
    }

    public function RestPassword(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:8|confirmed',
            'code'=>'required'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],404);
        }

        $otp=$this->otp->validate($request->email,$request->code);

        if($otp->status==true){
            User::where('email',$request->email)->update([
               'password'=>Hash::make($request->password)
            ]);
            return response()->json([
                'message'=>'Rest Password Successfully'
            ]);
        }else{
            return response()->json([
                'status'=>'failed',
                'error'=>$otp->message,
            ],401);
        }
    }
}
