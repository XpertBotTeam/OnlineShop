<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'user_id';
    protected $guarded = [];
    public function order(){
        return $this->hasMany(Order::class,'user_id','user_id');
    }
    public function isAdmin(){
        return $this->isAdmin;
    }
    public function analysis(){
        return $this->hasOne(Analysis::class,'user_id','user_id');
    }
    public function updateAnalysis(){
        $totalOrders = count($this->order()->get());
            $this->analysis()->updateOrCreate(['totalOrders'=>$totalOrders,'favoriteCategory'=>"chicken"]);
    }
    public function analyseAll(){
        $users = User::all();
        foreach($users as $user ){
            $user->updateAnalysis();
        }
    }
}
