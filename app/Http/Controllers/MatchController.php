<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ListedItem;
use App\Models\Item;
use App\Models\Thread;

use App\Models\TradeRequest;

class MatchController extends Controller
{
    public function index()
    {
        // リクエスト者の情報
        $sender_data = TradeRequest::with('user')->where('id', session('current_request_id'))->first();

        return view('match', compact('sender_data'));
    }

    public function start_deal(Request $request)
    {
        $requestId = $request->input('request_id') ?? session('current_request_id');

        if(!$requestId){
            return redirect()->back()->with('error','セッションがタイムアウトしました');
        }

        $requestData = TradeRequest::where('id',$requestId)->first();
        // リダイレクト
        // 別のコントローラーに再接続

        $thread_id = $request->input('thread_id');
        session(['current_thread_id' => $thread_id]);

        return redirect()->action([MessageController::class, 'index'])->with('thread_id',$thread_id);
    }
}
