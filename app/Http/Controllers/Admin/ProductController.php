<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function index(){
        $products= Product::latest()->get();
        return view('admin.allproducts',compact('products'));
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

        $image=$request->file('product_img');
        $img_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        //$request->product_img->move_uploaded_file(public_path('upload'),$img_name);
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url='upload/' . $img_name;

        Product::insert([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_img' => $img_url
        ]);
        Category::where('id',$category_id)->increment('product_count',1);
        SubCategory::where('id',$subcategory_id)->increment('product_count',1);

        return redirect()->route('allproducts')->with('msg','Products Added succesfully');
    }
    public function editProductImage($id){
        $productinfo=Product::findOrFail($id);
        return view('admin.editproductimage',['productinfo'=> $productinfo]);
    }

    public function updateProductImage(Request $request){
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product_img_id=$request->product_img_id;

        $image=$request->file('product_img');
        $img_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url='upload/' . $img_name;

        Product::findOrFail($product_img_id)->update([
            'product_img' => $img_url,
        ]);
        return redirect()->route('allproducts')->with('msg','Products Image Updated succesfully');

    }
    public function editProduct($id){
        $productinfo=Product::findOrFail($id);
        return view('admin.editproduct',['productinfo'=> $productinfo]);
    }
    public function updateProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
        ]);

        $product_id=$request->update_product_id;

        Product::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('allproducts')->with('msg','Products Updated succesfully');
    }

}
