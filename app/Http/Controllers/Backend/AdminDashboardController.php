<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // dashboard
    public function dashboard(){
        return view('backend.dashboard');
    }
}
