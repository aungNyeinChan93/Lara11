<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // register page
    public function registerPage(){
        return view("auth.registerPage");
    }

    // register
    public function register(Request $request){
        $validated = $request->validate([
            "name"=>["required"],
            "email"=>["required","email"],
            "password"=>["required","confirmed"],
            "password_confirmation"=>["required","same:password"],
        ]);

        // dd("success");
        $user = User::create($validated);

        Auth::login($user);

        return to_route("Home#dashboard");

    }

    // login Page
    public function loginPage(){
        return view("user.loginPage");
    }

    // login process
    public function login(Request $request){
        // dd($request->all());
        $validate = $request->validate([
            "email"=>"required",
            "password"=>"required",
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect()->route('Home#dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // logout
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
