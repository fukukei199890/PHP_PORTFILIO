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
        return view('seach');
    }

    public function read(Request $request)
    {
        // 検索結果データの初期化
        $results = [];
        $keyword = null;
        $isOpend = null;

        // requestオブジェクトから
        // inputデータを取得
        $keyword = $request->input('search');
        $isOpend = $request->input('is_opend');

        // itemsテーブルから検索結果と一致する名前を取り出す
        $hitItems = Item::where('char_name', 'LIKE', '%'.$keyword.'%')->get();

        // listed_itemsテーブルから一致した名前の出品物を探す
        foreach($hitItems as $key => $datas) {
            $results = ListedItem::where('item_id','=',$datas->id)->get();
        }

        return view('seach', compact('results'));
    }
}
