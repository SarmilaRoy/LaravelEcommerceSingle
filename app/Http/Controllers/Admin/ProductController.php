<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function index(){
        return view('admin.allproducts');
    }
    public function addProducts(){
        $categories= Category::latest()->get();
        $subcategories= SubCategory::latest()->get();
        return view('admin.addproducts',compact('categories','subcategories'));
    }
    public function storeProducts(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $category_id=$request->product_category_id;
        $category_name=Category::where('id',$category_id)->value('category_name');

        $subcategory_id=$request->product_subcategory_id;
        $subcategory_name=SubCategory::where('id',$subcategory_id)->value('subcategory_name');
    }

}
