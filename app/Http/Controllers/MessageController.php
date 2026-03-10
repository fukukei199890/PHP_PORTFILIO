<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Message;

class MessageController extends Controller
{
    //
    public function index()
    {
        // thread_id
        $thread_id = session('current_thread_id');

        $message_data = Message::where('thread_id',$thread_id)->get();

        return view('message',compact([
            'thread_id',
            'message_data'
            ]));
    }

    public function create_message(Request $request)
    {
        $message = Message::create([
            'thread_id' => session('current_thread_id'),
            'user_id' => Auth::user()->id,
            'message_text' => $request->input('message_text')
        ]);

        return  redirect()->action([MessageController::class, 'index']);
    }
}
