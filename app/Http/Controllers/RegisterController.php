<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('tampilan.user.register',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|min:5|max:18',
            'username' => 'required|min:5|max:18|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:12'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('sucess', 'Registration sucessfully, login please!');
    }
}
