<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class FiltersController extends Controller
{
    public function index(){
        $filters = [
            'categories'=>Category::all(),
            'brands'=>Brand::all(),
        ];
        return $filters;
    }
    public function filter(Request $request){
        $category = $request->category;
        $brand = $request->brand;
        $price = $request->price;
        if($category!=null && $brand == null && $price==null){
            return ProductResource::collection(
                Product::where('category_id',$category)->get()
            );
        }
        if($category==null && $brand!=null && $price==null){
            return ProductResource::collection(
                Product::where('brand_id',$brand)->get()
            );
        }
        if($category==null && $brand==null && $price!=null){
            return ProductResource::collection(
                Product::where('product_price',$price)->get()
            );
        }
        if($category!=null && $brand!=null && $price==null){
            return ProductResource::collection(
                Product::where('category_id',$category)
                ->where('brand_id',$brand)
                ->get()
            );
        }
        if($category==null && $brand!=null && $price!=null){
            return ProductResource::collection(
                Product::where('product_price',$price)
                ->where('brand_id',$brand)
                ->get()
            );
        }
        if($category!=null && $brand==null && $price!=null){
            return ProductResource::collection(
                Product::where('product_price',$price)
                ->where('category_id',$category)
                ->get()
            );
        }
        if($category==null && $brand==null && $price==null){
            return ProductResource::collection(
                Product::all()
            );
        }
    }
}
