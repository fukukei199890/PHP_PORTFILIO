<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Notifications\MessageReceived;

use App\Models\Message;
use App\Models\User;
use App\Models\Thread;

class MessageController extends Controller
{
    //
    public function index(Request $request)
    {
        // thread_id
        $thread_id = $request->input('thread_id') ?? session('current_thread_id');

        // スレッドのメッセージの取得
        $message_data = Message::where('thread_id', $thread_id)
            ->with('user') //福田追加
            ->get();

        return view('message', compact([
            'thread_id',
            'message_data'
        ]));
    }

    public function create_message(Request $request)
    {
        // ヴァリデーション
        $validated = $request->validate([
            'thread_id' => 'required|integer',
            'message_text' => 'required|string'
        ]);

        // メッセージの作成
        $message = Message::create([
            'thread_id' => $validated['thread_id'] ?? session('current_thread_id'),
            'user_id' => Auth::user()->id,
            'message_text' => $validated['message_text']
        ]);

        // 3. 通知処理の追加
        // thread_id から Thread モデルを取得
        $thread = Thread::find($validated['thread_id']);

        if ($thread) {
            // 自分ではない方の ID を取得
            $recipientId = ($thread->sender_id === Auth::id()) ? $thread->receiver_id : $thread->sender_id;

            // 通知を送る相手を取得
            $recipient = User::find($recipientId);

            if ($recipient) {
                // 通知を実行
                $recipient->notify(new MessageReceived($message));
            }
        }
        // ここまで通知処理

        return redirect()->route('message', ['thread_id' => $validated['thread_id']])
            ->with('message', 'メッセージを送信しました');
    }

    public function complete(Request $request)
    {
        $thread_id = $request->input('thread_id') ?? session('current_thread_id');

        return view('exchangecondition', compact('thread_id'));
    }
}
