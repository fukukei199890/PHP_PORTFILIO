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
        // 自分が受信者であるスレッドを、関連データと一緒に取得
        $requests = Thread::with(['sender', 'receiver'])
        ->where('receiver_id', Auth::id())
        ->get();

        return view('messageselect', compact('requests'));
    }
}
