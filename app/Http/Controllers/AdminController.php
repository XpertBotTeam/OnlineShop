<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
         $this->middleware('admin');
    }
    public function index(){
        return view('dashboard',[
            'users'=>User::with('analysis')->get()->sortByDesc('totalOrders'),
            'products'=>Product::with('category')->get()->take(3)->sortByDesc('created_at')
        ]);
    }
}
