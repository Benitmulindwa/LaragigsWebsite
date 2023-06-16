<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }
    public function store(Request $request){
        $formFilds=$request->validate([
               'name'=>['required','min:4'],
               'email'=>['required','email',Rule::unique('users','email')],
               'password'=>'required|confirmed|min:8',
        ]);
        //hash password
        $formFilds['password']=bcrypt($formFilds['password']);

        //Create User
        $user=User::create($formFilds);

        //Login
        auth()->login($user);

        return redirect('/')->with('message','User created and logged in');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
    
    public function login(){

        return view('users.login');
    }
    public function authenticate(Request $request){
        $formFilds=$request->validate([
            'email'=>['required','email'],
            'password'=>'required',
     ]);
     if(auth()->attempt($formFilds)){
        $request->session()->regenerate();
        return redirect('/')->with('message','You are now logged In');
     }
     return back()->withErrors(['email','Invalid Condentials'])->onlyInput('email');
    }
}
