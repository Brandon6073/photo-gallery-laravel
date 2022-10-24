<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register form
    public function create(){
        return view('users.register');
    }

    // Create user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'
            // password use confirmed_password in blade template 
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //  Create User
        $user = User::create($formFields);

        //  Login
        auth()->login($user);

        return redirect('/')->with('message', 'User Created and Logged in');
    }

    //  Logout 
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','Logged out');
    }

    // show login form
    public function login(){
        return view('users.login');
    }

    //  login user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','you are now logged in');
        }

        return back()->with('message','Loggin Failed');
    //  return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }

}
