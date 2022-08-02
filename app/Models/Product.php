<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order(){
        return $this->hasMany(Order::class,'product_id','product_id');
    }
    public function offers(){
        return $this->hasOne(Offer::class);
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','brand_id');
    }
}
