<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_customer');
    }
    public function index (){
        return view('Dashboard-Customer');
    }
}
