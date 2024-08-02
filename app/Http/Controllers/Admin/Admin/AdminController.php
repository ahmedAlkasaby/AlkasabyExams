<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $user=Auth::user();
        $admins=User::where('role_id','>',1)->whereNot('id', $user->id)->get();
        $roles=Role::get();
        return view('admin.admins.admins',[
            'admins'=>$admins,
            'roles'=>$roles
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'email|required|unique:users,email',
            'password'=>'required|min:8',
            'role_id'=>'required|exists:roles,id'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role_id'=>$request->role_id
        ]);

        session()->flash('createAdmin','Create Admin Successfully');
        return back();
    }

    public function up($userId){
        $user=User::find($userId);
        User::where('id',$userId)->update([
            'role_id'=>3
        ]);

        session()->flash('upAdmin','Update Admin Name '.$user->name .'To Super Admin');
        return back();
    }

    public function down($userId){
        $user=User::find($userId);
        User::where('id',$userId)->update([
            'role_id'=>1
        ]);

        session()->flash('downAdmin','Down Admin Name '.$user->name .'To User');
        return back();
    }


}
