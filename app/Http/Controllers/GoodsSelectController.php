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
    
    public function select(Request $request)
    {
    // 1. バリデーション
    $request->validate([
        'item_id'   => 'required|exists:listed_items,id', // IDが存在するかチェック
        'char_name' => 'required|string',
    ]);

    // 2. データをまとめてセッションに保存
    session([
        'temp_trade_data' => [
            'item_id'             => $request->input('item_id'), // ここで保存！
            'current_series_name' => $request->input('series_name'),
            'current_char_name'   => $request->input('char_name'),
            'current_is_opened'   => $request->input('is_opened'),
        ]
    ]);

    // viewに渡すデータの作成
    $result = session('temp_trade_data');

    return view('request', compact('result'));
}
}
