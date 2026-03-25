<?php

namespace App\Http\Controllers;

use App\Models\ListedItem;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //
    public function index()
    {
        return view('goods');
    }

    public function show($id)
    {
        $item = ListedItem::findOrFail($id);

        session(['current_item_id' => $id]);

        return view('goods', compact('item'));
    }

    public function select(Request $request)
    {
        $itemId = $request->input('listed_item_id');

        // 1. 個別のIDとしても保存（念のため）
        session(['current_item_id' => $itemId]);

        // 2. 次の GoodsSelectController で使う temp_trade_data の土
        session(['temp_trade_data' => [
            'item_id' => $itemId
        ]]);

        return view('goodsselect', compact('itemId'));
    }
}
