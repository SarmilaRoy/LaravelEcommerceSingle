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
}
