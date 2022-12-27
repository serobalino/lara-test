<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class MicrosoftController extends Controller
{
    public function redirect(){
        return Socialite::driver('microsoft-graph')->redirect();
    }

    public function login(){
        $login = Socialite::driver('microsoft-graph')->user();
        $user = User::where('email',$login->getEmail())->first();
        if(!$user){
            $user = new User();
            $user->name = $login->getName();
            $user->email = $login->getEmail();
            $user->email_verified_at = now();
            $user->password = $login->getId();
            $user->save();
        }
        Auth::login($user);
        return redirect('dashboard');
    }
}
