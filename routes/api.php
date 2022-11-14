<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FiltersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/products',[ProductsController::class,'products']);
Route::get('/categoriesAnalysis',[CategoryController::class,'analysis']);
Route::get('/homeCategories',[CategoryController::class,'homeCategories']);
Route::get('/categories',[FiltersController::class,'index']);
Route::post('/filterProducts',[FiltersController::class,'filter']);
Route::get('cart',[ProductsController::class,'cart']);
Route::post('addToCart',[ProductsController::class,'addToCart'])->middleware('auth');
Route::post('deleteFromCart',[ProductsController::class,'deleteFromCart']);
