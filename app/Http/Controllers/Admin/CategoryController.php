<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::latest()->get();
        return view('admin.allcategory',compact('categories'));
    }
    public function addCategory(){
        return view('admin.addcategory');
    }
    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-',$request->category_name))
        ]);
        return redirect()->route('allcategory')->with('msg','Category Added succesfully');
    }
    public function editCategory($id){
        $category_info=Category::findOrFail($id);
        return view('admin.editcategory',['category_info'=> $category_info]);
    }
    public function updateCategory(Request $request){
        $category_id = $request->category_id;
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-',$request->category_name))
        ]);
        return redirect()->route('allcategory')->with('msg','Category Updated succesfully');
    }
}
