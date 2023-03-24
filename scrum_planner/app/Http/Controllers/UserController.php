<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login(){
        return view('users.signin');
    }
    public function SignIn(Request $request){
        $fields = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        if(auth()->attempt($fields)){
            return 'Sikeres bejelentkezés';
        }
        return 'Sikertelen bejelentkezés';
    }
}
