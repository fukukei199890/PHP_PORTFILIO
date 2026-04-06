<?php

namespace App\Http\Controllers;

use App\Models\ListedItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        session(["current_goods_item_id" => $itemId]);

        if (Auth::user()) {
            // 1. 個別のIDとしても保存（念のため）
            session(['current_item_id' => $itemId]);

            // 2. 次の GoodsSelectController で使う temp_trade_data の土
            session(['temp_trade_data' => [
                'item_id' => $itemId
            ]]);

            return view('goodsselect', compact('itemId'));
        } else {
            return view('auth.login');
        }
    }
}
