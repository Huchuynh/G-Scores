<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function settings()
    {
        return view('settings');
    }
}
