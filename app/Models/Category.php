<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','slug'];
    use HasFactory;




    public function skills()
    {
        return $this->hasMany(Skill::class);
    }


    


}
