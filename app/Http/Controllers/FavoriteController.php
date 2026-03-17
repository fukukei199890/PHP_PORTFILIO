<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite; // お気に入りモデルをインポート
use App\Models\FavoriteItem;
use Illuminate\Support\Facades\Auth; // Authファサードをインポート

class FavoriteController extends Controller
{
    /**
     * お気に入り一覧ページを表示
     */
    public function index()
    {
        // ログイン中のユーザーがお気に入りした商品を取得する処理を将来的にここへ書きます
        return view('favorite');
    }

    /**
     * お気に入り登録処理
     */
    public function store($listed_item_id)
    {
        // すでに登録されていないかチェック
        $exists = FavoriteItem::where('user_id', Auth::id())
            ->where('listed_item_id', $listed_item_id)
            ->exists();

        if (!$exists) {
            FavoriteItem::create([
                'user_id' => Auth::id(),
                'listed_item_id' => $listed_item_id,
            ]);
        }

        return back(); // ボタンを押した元のページに戻る
    }

    /**
     * お気に入り解除処理
     */
    public function destroy($listed_item_id)
    {
        // 自分のIDと商品IDが一致するレコードを削除
        FavoriteItem::where('user_id', Auth::id())
            ->where('listed_item_id', $listed_item_id)
            ->delete();

        return back(); // 元のページに戻る
    }
}
