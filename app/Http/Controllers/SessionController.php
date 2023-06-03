<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    function index()
    {
        return view ("sesi/index");
    }
    function login()
    {
        return view("sesi/home");
    }
    function logout()
    {
        return view('auth.login');
    }
}
