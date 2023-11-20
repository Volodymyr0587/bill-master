<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $electricity = $user->electricities->toArray();
        
        return view('dashboard', ['electricity' => $electricity]);
    }
}
