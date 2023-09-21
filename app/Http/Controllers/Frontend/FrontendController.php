<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FrontendController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    
    
}

