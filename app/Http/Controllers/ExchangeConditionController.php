<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExchangeConditionController extends Controller
{
    //
    public function index(Request $request)
    {
        $thread_id = $request->input('thread_id') ?? session('current_thread_id');

        return view('exchangecondition', compact('thread_id'));
    }
}
