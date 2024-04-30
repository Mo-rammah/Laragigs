<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // show register form
    public function create()  {
        return view('users.register');
    }
    //create new user
    public function store(Request $request) {
        $formfields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' =>['required','confirmed','min:6']

        ]);
        //Hash password
        $formfields['password'] = bcrypt($formfields['password']);

        $user = User::create($formfields);

        // login

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
        
    }


    //logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'you have been logged out!');
    }

    //show the login form
    public function login() {
        return view('users.login');
    }

    //Authenticate user
    public function authenticate(Request $request)  {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' =>['required']
        ]);

        if(auth()->attempt($formfields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in');
        }
        return back()->withErrors(['email'=> 'invalid Credentials'])->onlyInput('email');
    }
}


            
