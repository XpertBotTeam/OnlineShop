<?php

namespace App\Http\Controllers;

use App\Models\CatAnalyses;
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
}
