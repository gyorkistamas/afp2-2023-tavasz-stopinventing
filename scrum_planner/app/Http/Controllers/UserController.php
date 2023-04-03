<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $email = $fields['email'];

        $user = User::where('email', $email)->first();

        if ($user) {
            $isSuspended = $user->status == 1 ? true : false;
        }

        //dd($isSuspended);

        if(auth()->attempt($fields)) {

            if ($isSuspended) {
                $request->session()->invalidate();
                return back()->withErrors(['password' => 'This user has been suspended!'])->onlyInput('password');
            }
            return redirect('/edit-profile');
        }
        return redirect('/sign-in');
    }
    
    public function LogOut(Request $request){
        auth()->logout();
        $request->session()->invalidate();
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
        $fields['status'] = 0;
        $user = User::create($fields);
        return redirect('/sign-in');
    }

    public function Profile(){
        return view('users.edit_profile');
    }
    public function EditProfile(Request $request){
        $fields = $request->validate([
            'full_name'=>['required'],
            'email'=>['required','email'],
            'password'=>['confirmed']
        ]);
        if($request->hasFile('picture')){
            $fields['picture'] = $request->file('picture')->store('Images/Uploads/Users','public');
            $fields['picture'] = '/storage/'.$fields['picture'];
        }
        else{
            $fields['picture'] = '/profile_pic_sample.png';
        }
        
        $user = auth()->user();
        $user->full_name = $fields['full_name'];
        $user->email = $fields['email'];
        $user->picture = $fields['picture'];
        if($request->has('password') && $request->get('password')!= ''){
            $fields['password'] = bcrypt($fields['password']);
            $user->password = $fields['password'];
        }
        $user->save();
        return redirect('/edit-profile');
    }

    public function List() {

        if (!Auth::check() || Auth::User()->privilage != 2) {
            return abort(401);
        }

        $listOfUsers = User::select(
            'id',
            'full_name',
            'email',
            'created_at',
            'privilage',
            'status',
            'picture'
        )->paginate(3);

        //dd($listOfUsers);

        return view('users.list', ['Users' => $listOfUsers]);
    }

    public function ChangeStatus(User $user)
    {
        if (!Auth::check() || Auth::User()->privilage != 2) {
            return abort(401);
        }

        //dd($user->id);

        $user->update(['status' => $user->status == 0 ? 1 : 0 ]);

        return redirect('/users');
    }

    // modify (popup window) / reset password

    public function ChangeRole(User $user, Request $request){
        if (!Auth::check() || Auth::User()->privilage != 2) {
            return abort(401);
        }
        $priv = $request->input('privilage');
        if($priv == -1){
            echo "Error while trying to change role";
            return redirect('/users');
        }
        $user->update(['privilage' => $user->privilage = $priv]);
        return redirect('/users');
    }
}
