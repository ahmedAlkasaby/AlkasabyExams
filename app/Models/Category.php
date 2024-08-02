<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    // protected $fillable=['name','slug'];
    // use HasFactory;

    // public function name($lag =null){
    //    if($lag == null){
    //     $lang=App::getLocale();
    //     return json_decode($this->name)->lang;
    //    }else{
    //      $lang=$lag;
    //      return json_decode($this->name)->$lang;
    //    }
    // }

    public function name($lang = null){
        return $this->getTranslatedAttribute('name',$lang);
    }



    public function skills()
    {
        return $this->hasMany(Skill::class);
    }





}
