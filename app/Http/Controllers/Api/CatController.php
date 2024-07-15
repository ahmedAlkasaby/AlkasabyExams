<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResouce;
use App\Http\Resources\SkillResource;
use App\Models\Category;
use App\Models\Skill;
use Barryvdh\Reflection\DocBlock\Type\Collection;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index(){
        $categories=Category::get();
        return CategoryResouce::collection($categories);
    }

    public function show($catId){
        $category=Category::with('skills')->find($catId);
        $skills=Skill::where('category_id',$catId)->get();
        if($category){
            return new CategoryResouce($category);
        }else{
            return response()->json([
                'message'=>'the category not found'
            ],404);
        }
    }
}
