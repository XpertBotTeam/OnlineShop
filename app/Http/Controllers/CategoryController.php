<?php

namespace App\Http\Controllers;

use App\Http\Resources\HeadCategoryResource;
use App\Models\CatAnalyses;
use App\Models\HeadCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function analysis(){
        $catAnalysis = CatAnalyses::with('category')->get();
        $googleChartArray = ['Cat','order'];
        foreach($catAnalysis as $key=>$cat){
            $googleChartArray[++$key] = [$cat->category->category_name,(int)$cat->totalOrders];
        }
        return $googleChartArray;
    }
    public function homeCategories(){
        return HeadCategoryResource::collection(HeadCategory::all());
    }
    public function index(){
        return ;
    }
}
