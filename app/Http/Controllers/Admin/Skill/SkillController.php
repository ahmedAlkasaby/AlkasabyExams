<?php

namespace App\Http\Controllers\Admin\Skill;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SkillController extends Controller
{
    public function index(){
        // $skills=Skill::orderBy('id','desc')->paginate(5);
        $skills=Skill::orderBy('id','desc')->filter(request(['search','category']))->paginate(5);
        $categories=Category::get();
        $lang=App::getLocale();
        return view('admin.skills.skills',[
            'skills'=>$skills,
            'categories'=>$categories,
            'lang'=>$lang

        ]);
    }

    public function store(Request $request ){

        // $request->validate([
        //     'name_ar'=>'required|string',
        //     'name_en'=>'required|string',
        //     'category_id'=>'required|exists:categories,id',
        //     'image'=>'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        // ]);



        $slug=Str::of($request->name_en)->slug('-').uniqid();


        $image=Storage::putFile('skills',$request->file('image'));



        Skill::create([
            'name'=>json_encode([
                'ar'=>$request->name_ar,
                'en'=>$request->name_en
            ]),
            'slug'=>$slug,
            'image'=>$image,
            'category_id'=>$request->category_id

        ]);
        session()->flash('skillCreate','Create skill Successfully');
        return back();
    }

    public function update(Request $request ){
        // dd($request->all());

        $request->validate([
            'id'=>'exists:skills,id',
            'name_ar'=>'required|string',
            'name_en'=>'required|string',
            'category_id'=>'required|exists:categories,id',
            'image'=>'nullable|image|max:2048'
        ]);
        $id=$request->id;

        $skill=Skill::find($id);

        $slug=Str::of($request->name_en)->slug('-').uniqid();
        if($request->hasFile('image')){
            $image=Storage::putFile('skills',$request->file('image'));
        }else{
            $image=$skill->image;
        }


        Skill::where('id',$id)->update([
            'name'=>json_encode([
                'ar'=>$request->name_ar,
                'en'=>$request->name_en
            ]),
            'slug'=>$slug,
            'image'=>$image,
            'category_id'=>$request->category_id


        ]);
        session()->flash('skillEdit','Edit Skill Successfully');
        return back();
    }

    public function delete($id){
        try {
            Skill::where('id',$id)->delete();
        }catch(Exception $e){
            session()->flash('skillNotDelete','مينفعش لانها مربوطه ببامتحانات') ;
            return back();
        }

        return back();
    }
}
