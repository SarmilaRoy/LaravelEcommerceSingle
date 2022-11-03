<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $allproducts= Product::latest()->get();
        return view('user.home',compact('allproducts'));
    }
}
