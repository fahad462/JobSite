<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userlogin extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
}
