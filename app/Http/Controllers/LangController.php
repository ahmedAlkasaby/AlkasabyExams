<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function setLang(Request $request,$lang){
        $langs=['ar','en'];
        if(! in_array($lang, $langs)){
            $request->session()->put('lang','en');
            return back();
        }else{
            $request->session()->put('lang',$lang);
            return back();
        }
    }
}
