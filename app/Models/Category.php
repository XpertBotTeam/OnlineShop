<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product(){
        return $this->hasMany(Product::class,'category_id','category_id');
    }
    public function analysis(){
        return $this->hasOne(CatAnalyses::class,'category_id','category_id');
    }
    public function updateAnalysis(){
        $products = $this->product()->with('order')->get();
        $totalOrders = count($products[0]['order']);
        $this->analysis()->updateOrCreate(['totalOrders'=>$totalOrders]);
    }
}
