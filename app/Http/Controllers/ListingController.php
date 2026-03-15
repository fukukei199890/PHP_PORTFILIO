<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListedItem;



class ListingController extends Controller
{
    //
    public function index()
    {
        // ログインユーザーの出品物を、画像リレーションと一緒に取得
        $items = auth()->user()->listed_items()
            ->with('images')
            ->latest()
            ->get();

        return view('listing', compact('items'));
    }

    public function destroy(ListedItem $listedItem)
    {
        // 本人確認：ログインユーザーのIDと、出品物の所有者IDが一致するか
        if ($listedItem->user_id !== auth()->id()) {
            abort(403); // 権限がない場合はエラーを返す
        }

        // 削除実行
        $listedItem->delete();

        return redirect()->route('listing')->with('success', '商品を削除しました');
    }
}
