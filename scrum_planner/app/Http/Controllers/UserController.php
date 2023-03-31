<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            return view('users.my_profile');
        }
        return redirect('/sign-in');
    }
    public function LogOut(Request $request){
        auth()->logout();
        $request ->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function Register(){
        return view('users.signup');
    }

    public function SignUp(Request $request){
        $fields = $request->validate([
            'full_name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required','confirmed']
        ]);
        if($request->hasFile('picture')){
            $fields['picture'] = $request->file('picture')->store('Images/Uploads/Users','public');
            $fields['picture'] = '/storage/'.$fields['picture'];
        }
        else{
            $fields['picture'] = '/profile_pic_sample.png';
        }
        $fields['password'] = bcrypt($fields['password']);
        $fields['privilage'] = 0;
        $user = User::create($fields);
        return redirect('/sign-in');
    }
}
