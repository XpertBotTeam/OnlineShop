<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function checkLogin(){
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($attributes)){
            $user = User::where('email',$attributes['email'])->first();
            if($user->isAdmin()==true){
                return redirect()->route('dashboard');
            }
            else return redirect()->route('home');
        }
        return back()->withErrors([
            'loginError'=>'Email or password not found !'
        ])->withInput();
    }
}
