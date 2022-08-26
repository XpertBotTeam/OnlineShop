<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Http\Request;

class FacebookController extends Controller
{
    public function loginWithFacebook(){
        return Socialite::driver('facebook')->redirect();
    } 
    public function callBackFromFacebook(){
        try{
            $facebookUser = Socialite::driver('facebook')->user();
            $userEmailExist = User::where('email',$facebookUser->getEmail())->first();
            if($userEmailExist){
                Auth::loginUsingId($userEmailExist->user_id);
                return redirect()->route('home');
            }  
            else{
                $newUser = User::create([
                    'username'=>$facebookUser->getName(),
                    'email'=>$facebookUser->getEmail(),
                    'password'=>Hash::make($facebookUser->id.$facebookUser->getName())
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
