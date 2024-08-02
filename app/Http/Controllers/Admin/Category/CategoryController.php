<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index(){
        $categories=Category::orderBy('id','desc')->paginate(5);
        $lang=App::getLocale();
        return view('admin.categories.categories',[
            'categories'=>$categories,
            'lang'=>$lang
        ]);
    }

    public function store(Request $request ){
        $request->validate([
            'name_ar'=>'required|string',
            'name_en'=>'required|string'
        ]);

        $slug=Str::of($request->name_en)->slug('-').uniqid();

        Category::create([
            'name'=>json_encode([
                'ar'=>$request->name_ar,
                'en'=>$request->name_en
            ]),
            'slug'=>$slug
        ]);
        session()->flash('categoryCreate','Create Category Successfully');
        return back();
    }

    public function update(Request $request ){
        $request->validate([
            'id'=>'exists:categories,id',
            'name_ar'=>'required|string',
            'name_en'=>'required|string'
        ]);
        $id=$request->id;

        $slug=Str::of($request->name_en)->slug('-').uniqid();

        Category::where('id',$id)->update([
            'name'=>json_encode([
                'ar'=>$request->name_ar,
                'en'=>$request->name_en
            ]),
            'slug'=>$slug
        ]);
        session()->flash('categoryEdit','Edit Category Successfully');
        return back();
    }

    public function delete($id){
        Category::where('id',$id)->delete();
        return back();
    }
}
