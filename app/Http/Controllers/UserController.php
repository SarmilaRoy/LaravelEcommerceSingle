<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function categoryPage(){
        return view('user.category');
    }
    public function singleProduct(){
        return view('user.singleproduct');
    }
    public function addToCart(){
        return view('user.addtocart');
    }
    public function Checkout(){
        return view('user.checkout');
    }
    public function userProfile(){
        return view('user.userprofile');
    }
    public function NewRelease(){
        return view('user.newrelease');
    }
    public function TodaysDeal(){
        return view('user.todaysdeal');
    }
    public function CustomerService(){
        return view('user.customerservice');
    }
}
