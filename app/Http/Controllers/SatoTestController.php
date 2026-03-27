<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Message;

class SatoTestController extends Controller
{
    public function index(){
        return view('satoTest');
    }

    public function markAsRead(Request $request){
        // 通知id
        $notificationId = $request->input('notificationId');
        // 通知データ
        $notification = Auth::user()->unreadNotifications->find($notificationId);
        
        if(!$notification){
            // 通知が見つからなかったとき
            return redirect()->back()->with('message','通知が見つかりませんでした');
        }
        if($notification->type == "App\\Notifications\\MessageReceived"){
            // 通知タイプがメッセージ受け取りの時
            // 送信者のid
            $senderId = $notification->data['sender_id'];
            // 同一のユーザーから送られてきた全ての未読メッセージ通知のインスタンス

            if(!$senderId){
                // 送信Idがnullのとき
                return redirect()->back()->with('message','送信者が見つかりませんでした');
            }

            $notifications = Auth::user()->unreadNotifications->where('type', 'App\\Notifications\\MessageReceived')
                ->filter(function($n) use ($senderId) {
                return $n->data['sender_id'] == $senderId;
            });
            // 既読処理
            $notifications->markAsRead();

            // 届いた時間を取得
            $received_at = $notification->created_at->subSecond();

            // スレッドidの取得
            $threadId = Message::where('id',$notification->data['message_id'])->first()->thread_id;
            // セッションに保存
            session(['current_thread_id'=>$threadId]);

            return redirect()->route('message')->with('received_at',$received_at);
        }
    }
}
