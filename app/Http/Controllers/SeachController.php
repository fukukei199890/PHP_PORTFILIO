<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListedItem;
use App\Models\Item;

class SeachController extends Controller
{
    //
    public function index()
    {
        $test = ['test','test2'];

        return view('seach', compact('test'));
    }

    public function read(Request $request)
    {
        // requestオブジェクトからinputプロパティのname="search"を取得
        $keyword = $request->input('search');

        //  Itemモデルのインスタンスを生成
        // 条件はchar_nameが検索キーワードと同じ
        // 検索結果をidのみの配列として itemIdsに格納している
        $itemIds = Item::where('char_name', 'LIKE', "%{$keyword}%")->pluck('id');

        // withの意味はListedItemの要素に加えて、紐づけられたitemの要素も取得する
        // ここで、itemはListedItemないで定義したメソッド
        // メソッドitemを通じてListedItemとItemが結びつく
        // whereInの意味は$itemIdsの配列の要素である'item_id'のデータを取り出すこと
        $results = ListedItem::with('item')->whereIn('item_id', $itemIds)->get();

        return view('seach', compact('results'));
    }
}
