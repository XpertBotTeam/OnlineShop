<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\HeadCategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\HeadCategory;
use App\Models\Product;
use  Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ProductsController extends Controller
{
    public function products(Request $request){
        if($request->dep){
            return HeadCategoryResource::collection(HeadCategory::where('name',$request->dep)->get());
        }
        else {
            return CategoryResource::collection(Category::where('category_name',$request->cat)->get());
        }
    }
    public function cart(){
        return Session::get('cart');
    }
    public function addToCart(Request $request){
        $product = $request->product;
        if(in_array($product,session()->get('cart')))
            return ;
        session()->push('cart',$request->product);
        return Session::get('cart');
    }
    public function deleteFromCart(Request $request){
        $product = $request->product;
        $cart = session()->get('cart');
        if(in_array($product,session()->get('cart'))){
            return "yes"; 
        }
        return session()->get('cart');
    }
}
