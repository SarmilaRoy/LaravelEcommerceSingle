<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
class SubCategoryController extends Controller
{
    public function index(){
        $subcategories=SubCategory::latest()->simplePaginate(5);
        return view('admin.allsubcategory',compact('subcategories'));
    }
    public function addSubCategory(){
        $categories= Category::latest()->get();
        return view('admin.addsubcategory',compact('categories'));
    }
    public function storeSubCategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id' => 'required'
        ]);
        $category_id=$request->category_id;
        $category_name=Category::where('id',$category_id)->value('category_name');
        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name,
        ]);
        Category::where('id',$category_id)->increment('subcategory_count',1);

        return redirect()->route('allsubcategory')->with('msg','Sub Category Added succesfully');
    }
}
