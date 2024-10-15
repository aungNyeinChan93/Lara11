<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class HomeController extends Controller implements HasMiddleware


{

    // middleware
    public static function middleware()
    {
        return [
            // "guest",
        ];
    }
    // home index
    public function dashboard(){
        return view("user.home");
    }
}
