<?php

namespace App\Http\Controllers;

use App\Models\HeadCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function homeCategories(){
        return HeadCategory::all();
    }
}
