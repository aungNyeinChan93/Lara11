<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\userScribeEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Listeners\CreateSubscribeListener;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

        event(new Registered($user));

        if($request->check){
            // dd("done");
            event(new userScribeEvent($user));

        }

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

    // Email Verification Notice
    public function verificationNotice() {
        $user = Auth::user();
        return view('auth.verify-email',compact("user"));
    }

    // Email Verification Handler
    public function verificationHandeler(EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('Home#dashboard');
    }

    // Resending the Verification Email
    public function verificationEmail(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
