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
        // 通知IDから通知情報を取得
        $notification = Auth::user()->notifications()->find($id);

        if($notification) {
            $sender_id = $notification->data['sender_id'];
        }

        // 既読にする通知を取得
        // sender_idが同じ通知を一括で既読にする
        $notification = Auth::user()->unreadNotifications()
        ->where('data->sender_id',$sender_id)
        ->update(['read_at' => now()]);

        // threa_idの取得
        $thread = Thread::where(function($q) use ($request) {
            $q->where('receiver_id', Auth::id())
            ->where('sender_id', $request->input('sender_id'));}
            )->orWhere(function($q) use ($request) {
            $q->where('sender_id', Auth::id())
            ->where('receiver_id', $request->input('sender_id'));}
        )->first();

        if (!$thread) {
        // デバック用のリダイレクト
        return redirect()->back()->with('error', 'スレッドが見つかりません。相手ID:' . $request->input('sender_id'));
        }

        $thread_id = $thread->id;

        return redirect()->route('message', ['thread_id' => $thread_id]);
    }
}
