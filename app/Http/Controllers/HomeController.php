<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.views.home');
    }

    public function login()
    {
        return view('home.views.login');
    }
    
    public function signup()
    {
        return view('home.views.signup');
    }
}
