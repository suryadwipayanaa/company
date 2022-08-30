<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('tampilan.user.login',[
            'title' => 'Login Area'
        ]);
    }


    // login

   public function store(Request $request){
    $validateData = $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    if(Auth::attempt($validateData)){
        $request->session()->regenerate();
        
            return redirect('/dashboard');
    }

    return back()->with('loginError', 'Error , Login Please!');
   }


//    logout

public function logout(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');

}

}
