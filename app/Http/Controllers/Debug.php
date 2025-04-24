<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Debug extends Controller
{
    public function index () {

        return view('debug.loadingpage');
    }
    public function page () {

        return view('debug.page');
    }
    public function loginpage () {

        return view('debug.loginpage');
    }
    public function signuppage () {

        return view('debug.signuppage');
    }
    public function homepage () {

        return view('debug.homepage');
    }
}
