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

        // 商品idをセッションに保存する
        session(['current_item_id' => $request->input('listed_item_id')]);

        return view('goodsselect', compact('itemId'));
    }
}
