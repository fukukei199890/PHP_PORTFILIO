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
    public function index(Request $request)
    {
        // リクエストID
        $request_id = $request->input('action');

        session(['current_request_id' => $request_id]);

        // リクエスト者の名前
        $sender_data = TradeRequest::with('user')->where('id', $request_id)->first();
        $user_name = $sender_data->user->name;

        return view('match', compact('request_id', 'user_name'));
    }

    public function start_deal()
    {
        $request_data = TradeRequest::where('id', session('current_request_id'))->first();

        if ($request_data) {
            // request statusをfalseに書き換える
            $request_data->status = false;
            $request_data->save();

            $thread = Thread::create([
                'sender_id' => $request_data->user_id,
                'receiver_id' => Auth::user()->id,
                'listed_item_id' => $request_data->listed_item_id,
                'is_matched' => false
            ]);
        }

        // リダイレクト
        // 別のコントローラーに再接続
        return redirect()->action([MessageSelectController::class, 'index']);
    }
}
