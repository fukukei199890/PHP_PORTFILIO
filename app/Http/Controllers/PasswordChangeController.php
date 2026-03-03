<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordChangeController extends Controller
{
    //
    public function index()
    {
        return view('passwordchange');
    }
}
