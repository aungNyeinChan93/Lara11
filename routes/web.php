<?php

require_once __DIR__ . "/mail.php";

use App\Http\Controllers\PostController;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialLoginController;

Route::get('/', function () {
    return view('test.home');
});

Route::get("auth/{provider}/redirect", [SocialLoginController::class, "redirect"]);
Route::get("auth/{provider}/callback", [SocialLoginController::class, "callback"]);

//
Route::post("testForm", function (Request $request) {
    $request->validate([
        "text" => "required"
    ], [
        "text.required" => "စာသားအကွက် လိုအပ်သည်။ "
    ]);
    $note = Note::create([
        "text" => $request->text,
    ]);
    return Note::orderBy("id", "desc")->get();
})->name("test");


Route::middleware("guest")->group(function () {
    // auth
    Route::get("registerPage", [AuthController::class, "registerPage"])->name("Auth#registerPage");
    Route::post("register", [AuthController::class, "register"])->name("Auth#register");
    Route::get("login", [AuthController::class, "loginPage"])->name("Auth#loginPage");
    Route::post("login", [AuthController::class, "login"])->name("Auth#login");
});

Route::group(["middleware" => "auth"], function () {

    Route::post("logout", [AuthController::class, "logout"])->name("Auth#logout");

    // Dashboard
    Route::get("home", [HomeController::class, "dashboard"])->middleware('verified')->name("Home#dashboard");

    // myPost
    Route::get("myposts", [PostController::class, "myPosts"])->name("posts.myPosts");

    // user posts
    Route::get("{user}/posts", [PostController::class, "userPosts"])->name("user.posts");

    // Email Verification -- middleware("verified)
    Route::get('/email/verify', [AuthController::class, "verificationNotice"])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}',[AuthController::class, "verificationHandeler"] )->middleware( 'signed')->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, "verificationEmail"])->middleware( 'throttle:6,1')->name('verification.send');
}); 

   // use resource route
   Route::resource("posts", PostController::class);




