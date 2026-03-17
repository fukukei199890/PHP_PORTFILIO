<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Thread;

class MessageReceivedController extends Controller
{
    public function index() {
        return view('messageReceived');
    }

    public function read($id, Request $request) {
        // 既読にする通知を取得
        $notification = Auth::user()->unreadNotifications->find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        // threa_idの取得
        $thread = Thread::where(function($q) use ($request) {
            $q->where('receiver_id', Auth::id())
            ->where('sender_id', $request->input('sender_id'));}
            )->orWhere(function($q) use ($request) {
            $q->where('sender_id', Auth::id())
            ->where('receiver_id', $request->input('sender_id'));}
        )->first();

        if (!$thread) {
        // デバッグ用に情報を出してリダイレクト
        return redirect()->back()->with('error', 'スレッドが見つかりません。相手ID:' . $request->input('sender_id'));
    }

        $thread_id = $thread->id;

        return redirect()->route('message', ['thread_id' => $thread_id]);
    }
}
