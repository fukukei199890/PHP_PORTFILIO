<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Notifications\MessageReceived;

use App\Models\Message;
use App\Models\User;
use App\Models\Thread;
use App\Models\ListedItem;

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

        // threadに紐づいたアイテムの配列
        $thread = Thread::with('listed_items')->find($thread_id);

        // threadに紐づいた出品物
        $listedItems = ListedItem::whereRelation('threads','threads.id',$thread_id)
            ->where('user_id',Auth::user()->id)
            ->get();

        return view('message', [
            'thread_id' => $thread_id,
            'message_data' => $message_data,
            'trading_items' => $listedItems
        ]);
    }

    public function create_message(Request $request)
    {
        // ヴァリデーション
        $validated = $request->validate([
            'thread_id' => 'required|integer',
            'message_text' => 'required|string'
        ]);

        // 連投の制限
        // 最後に投稿されたメッセージの取得
        $lastMessage = Message::where('user_id',Auth::user()->id)
        ->orderBy('created_at','desc') // 作成時の降順に並べ替える
        ->first(); // 降順の一番上、すなわち最新のメッセージを取得

        if ($lastMessage && $validated['message_text'] === $lastMessage->message_text){
            // 最新のメッセージと投稿されたメッセージが等しい時
            return redirect()->back()->with('error','同じメッセージを続けて送信をしないでください。');
        }
        // ここまで連投の制限

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
                    
            }
        }
        // ここまで通知処理

        return redirect()->route('message', ['thread_id' => $validated['thread_id']])
            ->with('message', 'メッセージを送信しました');
    }

    public function complete(Request $request)
    {
        $thread_id = $request->input('thread_id') ?? session('current_thread_id');
        $listed_item_id = $request->input('listed_item_id');

        return view('exchangecondition', compact('thread_id','listed_item_id'));
    }

    public function update(Request $request)
    {
        // ヴァリデーション
        $validated = $request->validate([
            'messageId' => 'required|integer|exists:messages,id', //DB上に存在するidか確認
            'messageText' => 'required|string|Max:256'
        ]);

        // メッセージの取得
        $message = Message::where('id', $validated['messageId'])->first();

        // メッセージの編集
        $message->update(["message_text"=>$validated['messageText']]);

        return redirect()->back()->with('message','メッセージを更新しました');
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'messageId' => 'required|integer|exists:messages,id', //DB上に存在するidか確認
        ]);

         // メッセージの取得
        $message = Message::where('id', $validated['messageId'])->first();

         // メッセージの編集
        $message->delete();

        return redirect()->back()->with('message','メッセージを削除');
    }
}
