<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','role:user'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin/dashboard','index')->name('admindashboard');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/admin/all-category','index')->name('allcategory');
        Route::get('/admin/add-category','addCategory')->name('addcategory');
        Route::post('/admin/store-category','storeCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}','editCategory')->name('editcategory');
        Route::post('/admin/update-category','updateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}','deleteCategory')->name('deletecategory');
    });
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/admin/all-subcategory','index')->name('allsubcategory');
        Route::get('/admin/add-subcategory','addSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory','storeSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}','editSubCategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory','updateSubCategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}','deleteSubCategory')->name('deletesubcategory');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/all-products','index')->name('allproducts');
        Route::get('/admin/add-products','addProducts')->name('addproducts');
        Route::post('/admin/store-products','storeProducts')->name('storeproducts');
        Route::get('/admin/edit-product-image/{id}','editProductImage')->name('editproductimage');
        Route::post('/admin/update-product-image','updateProductImage')->name('updateproductimg');
    });
    Route::controller(OrderController::class)->group(function(){
        Route::get('/admin/pending-orders','index')->name('pendingorders');

    });
});

require __DIR__.'/auth.php';
