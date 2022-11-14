<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    } 
    public function callBackFromGoogle(){
        try{
            $googleUser = Socialite::driver('google')->user();
            $userEmailExist = User::where('email',$googleUser->getEmail())->first();
            if($userEmailExist){
                Auth::loginUsingId($userEmailExist->user_id);
                session()->put('cart',[ ]);
                return redirect()->route('home');
            }  
            else{
                $newUser = User::create([
                    'username'=>$googleUser->getName(),
                    'email'=>$googleUser->getEmail(),
                    'password'=>Hash::make($googleUser->id.$googleUser->getName())
                ]);
                Auth::login($newUser);
                return redirect()->route('register');
            } 
        }
        catch(\Throwable $th){
            throw $th;
        }
    }
}
