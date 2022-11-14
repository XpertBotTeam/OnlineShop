<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;



use App\Models\Category;
use App\Models\HeadCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/',function(){
    return view('welcome',[
        'categories'=>HeadCategory::all()
    ]);
});
Route::get('home', function () {
    return view('welcome',[
        'categories'=>HeadCategory::all()
    ]);
})->name('home');
Route::get('shop',function(){
    return view('shop',[
        'categories'=>HeadCategory::all()
    ]);
})->name('shop');
Route::get('shop/{category}',function(){
    return view('shop',[
        'categories'=>HeadCategory::all()
    ]);
});
Route::get('cart',function(){
    return view('cart',[
        'categories'=>HeadCategory::all(),
    ]);
})->middleware('auth');
Route::post('checkLogin',[LoginController::class,'checkLogin']);
Route::post('registerUser',[RegisterController::class,'create']);
Route::get('logout',function(){
    auth()->logout();
    return redirect('/home'); 
});
//Login with google routes
Route::get('loginWithGoogle',[GoogleController::class,'loginWithGoogle']);
Route::get('callback',[GoogleController::class,'callBackFromGoogle']);
//Login with facebook routes
Route::get('loginWithFacebook',[FacebookController::class,'loginWithFacebook']);
Route::get('callbackFacebook',[FacebookController::class,'callBackFromFacebook']);

Route::get('/dashboard',[AdminController::class,'index'])->middleware('admin')->name('dashboard');

Auth::routes(['login']);
