<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Thread;
use App\Models\ListedItem;

class MessageSelectController extends Controller
{
    //
    public function index()
    {
        // 自分が受信者または送信者であるスレッドを、関連データと一緒に取得
        $requests = Thread::with(['sender', 'receiver'])
        ->where('receiver_id', Auth::id())->orWhere('sender_id',Auth::id())
        ->get();

        return view('messageselect', compact('requests'));
    }

    public function start_talk(Request $request)
    {
        session(['current_thread_id' => $request->input('thread_id')]);
        return  redirect()->action([MessageController::class, 'index']);
    }
}
