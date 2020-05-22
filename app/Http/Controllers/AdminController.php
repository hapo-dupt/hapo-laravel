<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Dashboard Admin.
     */
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }
}
