<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TradeRequest;
use App\Models\User;
use App\Models\ListedItem;
use App\Notifications\RequestReceived;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        // 1. ログインしているかチェック
        if (Auth::check()) {

            return view('request', [
                'inputs' => $request->all()
            ]);
        } else {
            // 2. 未ログインの場合の遷移先を指定


            return redirect()->route('applicationnot');
        }
    }

    public function store(Request $request)
    {
        // ポケット(セッション)から以前のデータを取り出す
        $data = session('temp_trade_data');

        // もしポケットが空っぽならエラー（不正なアクセスやタイムアウト）
        if (!$data) {
            return redirect()->route('request.store')->with('error', 'やり直してください');
        }

        // ここで初めて届いた画像を保存して、その「住所(パス)」を取得する
        $path = $request->hasFile('image') ? $request->file('image')->store('requests', 'public') : '';

        // 【合体！】以前のデータ($data) ＋ 新しい画像パス ＋ メッセージ をDBへ
        $tradeRequest = TradeRequest::create([
            'user_id'        => auth()->id(),
            'listed_item_id' => session('current_item_id'),
            'request_series' => $data['current_series_name'],
            'request_char'   => $data['current_char_name'],
            'is_opened'      => $data['current_is_opened'],
            'image_url'      => $path,

            'request_message'        => $request->input('request_message'),
            'status'         => 1
        ]);

        // 用が済んだのでポケット(セッション)を空にする
        session()->forget('temp_trade_data');

        // 3. 通知処理の追加
        // 出品物とユーザーをリレーション
        $listed_item = ListedItem::where('id',session('current_item_id'))->first();
        // 受信者
        // この場合はリクエスト対象の出品物の出品車
        $recipient = User::find($listed_item->user_id);
            if ($recipient) {
                // 通知を実行
                $recipient->notify(new RequestReceived($tradeRequest));
            }
        // ここまで通知処理

        return redirect()->route('top')->with('status', 'リクエストを申請しました!');
    }
}
