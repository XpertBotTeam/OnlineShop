<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;



use App\Models\Category;
use Illuminate\Support\Facades\Route;


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
Route::get('/',function(){
    return view('welcome',[
        'categories'=>Category::all()
    ]);
});
Route::get('home', function () {
    return view('welcome',[
        'categories'=>Category::all()
    ]);
})->name('home');

Auth::routes(['login']);

Route::post('checkLogin',[LoginController::class,'checkLogin']);
Route::post('registerUser',[RegisterController::class,'create']);
Route::get('logout',function(){
    auth()->logout();
    return redirect('/home'); 
});
Route::get('loginWithGoogle',[GoogleController::class,'loginWithGoogle']);
Route::get('callback',[GoogleController::class,'callBackFromGoogle']);
Route::get('/dashboard',[AdminController::class,'index'])->middleware('admin')->name('dashboard');

