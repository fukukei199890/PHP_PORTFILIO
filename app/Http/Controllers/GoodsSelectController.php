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

    public function test(Request $request)
    {
        $currentItemId = session('current_item_id');
        $path = '';

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('requests', 'public');
        }

        // セッションにデータをセット
        $tempData = [
            'listed_item_id' => $currentItemId,
            'request_series' => $request->input('series_name') ?? '',
            'request_char'   => $request->input('char_name'),
            'is_opened'      => $request->input('is_opened', 0),
            'image_url'      => $path,
        ];

        // ★ 修正ポイント: put のあとに save() を追加
        $request->session()->put('temp_trade_data', $tempData);
        $request->session()->save();

        return redirect()->route('request.confirm');
    }

    // ★最終的にメッセージと一緒にDB保存するメソッド
    public function store(Request $request)
    {
        $data = session('temp_trade_data');

        if (!$data) {
            return redirect()->route('goodsselect.index')->with('error', 'セッションがタイムアウトしました。');
        }

        // ここで初めてDBに保存
        TradeRequest::create([
            'user_id'        => Auth::id(),
            'listed_item_id' => $data['listed_item_id'],
            'request_series' => $data['request_series'],
            'request_char'   => $data['request_char'],
            'is_opened'      => $data['is_opened'],
            'image_url'      => $data['image_url'],
            'message'        => $request->input('message'), // テキストエリアの内容
            'status'         => 1
        ]);

        // セッションをクリア
        session()->forget('temp_trade_data');

        return redirect()->route('home')->with('success', '申請を送信しました！');
    }
}
