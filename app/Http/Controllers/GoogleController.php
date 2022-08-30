<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){

        $user = Socialite::driver('google')->user();

        $findUser = User::where('google_id', $user->getId())->first();

        if($findUser){
            Auth::login($findUser);
            return redirect()->intended('/home');
        } else {
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'username' => bcrypt('ceskandong'),
                'password' => bcrypt('1234dfn'),
                'google_id' => $user->getId()
            ]);

            Auth::login($newUser);
            return redirect()->intended('/home');
        }

    }
}
