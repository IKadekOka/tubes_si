<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardSupirController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_supir');
    }
    public function index (){
        return view('Dashboard-Supir');
    }
}
