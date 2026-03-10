<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function index(Request $request)
    {
        // thread_id
        $thread_id = session('current_thread_id');

        return view('message',compact('thread_id'));
    }
}
