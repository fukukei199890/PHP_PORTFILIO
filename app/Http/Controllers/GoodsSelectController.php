<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ListedItem;

use App\Models\TradeRequest;



class GoodsSelectController extends Controller
{
    //
    public function index()
    {

        return view('goodsselect');
    }

    // public function test(Request $request)
    // {

    //     $currentItemId = session('current_item_id');


    //     $path = ''; // 初期値を空文字にする（DBエラー回避）

    //     // HTMLの name="image" と一致させる
    //     if ($request->hasFile('image')) {
    //         // storage/app/public/requests フォルダに保存し、そのパスを $path に入れる
    //         $path = $request->file('image')->store('requests', 'public');
    //     }

    //     // 2. データベース保存
    //     $traderequest = TradeRequest::create([
    //         'listed_item_id' => $currentItemId,
    //         'request_series' => $request->input('series_name') ?? '',
    //         'request_char'   => $request->input('char_name'),
    //         'is_opened'      => $request->input('is_opened', 0),
    //         'image_url'      => $path, // 保存したパス（成功なら requests/xxx.jpg）を保存
    //         'user_id'        => Auth::user()->id,
    //         'status'         => 1
    //     ]);

    //     // $image = Image::create([

    //     // ]);


    //     // $char_name = $request->input('char_name');
    //     // $series_name = $request->input('series_name');
    //     // $is_opened = $request->input('is_opened');

    //     // session('キー' => '値') という書き方をします
    //     // session(['sato_char_name' => $request->input('series_name')]);

    //     // $result = session('sato_char_name');

    //     $result = $traderequest;


    //     //福田 既存のlisted itemをセッションで保存している
    //     $item = ListedItem::findOrFail(session('current_item_id'));


    //     return view('goods', compact('item', 'result'));
    // }


    // ...

    public function select(Request $request)
    {
        session([
            'temp_trade_data' =>
            [
                'current_series_name' => $request->input('series_name'),
                'current_char_name' => $request->input('char_name'),
                'current_is_opened' => $request->input('is_opened')
            ]
        ]);

        $result = $request;

        // 4. 次の「リクエスト申請ページ（窓口）」へ移動する
        return view('request', compact('result'));
    }

    public function store(Request $request)
    {
        // ポケット(セッション)から以前のデータを取り出す
        $data = session('temp_trade_data');

        // もしポケットが空っぽならエラー（不正なアクセスやタイムアウト）
        if (!$data) {
            return redirect()->route('goodsselect')->with('error', 'やり直してください');
        }

        // ここで初めて届いた画像を保存して、その「住所(パス)」を取得する
        $path = $request->hasFile('image') ? $request->file('image')->store('requests', 'public') : '';

        // 【合体！】以前のデータ($data) ＋ 新しい画像パス ＋ メッセージ をDBへ
        TradeRequest::create([
            'user_id'        => auth()->id(),
            'listed_item_id' => session('current_item_id'),
            'request_series' => $data['current_series_name'],
            'request_char'   => $data['current_char_name'],
            'is_opened'      => $data['current_is_opened'],
            'image_url'      => $path,

            'message'        => $request->input('message'),
            'status'         => 1
        ]);

        // 用が済んだのでポケット(セッション)を空にする
        session()->forget('temp_trade_data');

        return redirect()->route('home');
    }
}
