<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    use HasFactory;

   protected $guarded=['id','created_at','updated_at'];


    public function getTranslatedAttribute($attribute, $lang = null)
    {
        $lang = $lang ?? App::getLocale();

        $user=Auth::guard('api')->user();
        if($user){
            $userLang=$user->lang;
            return json_decode($this->$attribute)->$userLang;
       }else{
            return json_decode($this->$attribute)->$lang;
        }
    }


}
