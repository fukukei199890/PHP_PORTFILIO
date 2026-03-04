<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageBeforeController extends Controller
{
    public function index()
    {
        return view('mypageBefore');
    }
}
