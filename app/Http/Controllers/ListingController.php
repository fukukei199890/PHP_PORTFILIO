<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TradeRequest;
use App\Models\ListedItem;
use App\Models\Thread;


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

        // トランザクション開始
        DB::transaction(function() use ($listedItem) {

            // 出品物の削除
            $listedItem->delete();
            // 関連するリクエストの削除
            $trade_requests = TradeRequest::where('listed_item_id',$listedItem->id)->get();
               foreach($trade_requests as $row){
                $row->delete();
            }

            // ここから関連スレッドの状態をアップデート
            $relatedThreads = $listedItem->threads; 

            foreach($relatedThreads as $row){
                // count() は自動的に削除済みのものを除外してくれます
                $remainingItemsCount = $row->listed_items()->count();

                // 3. アイテムが1つも残っていない場合のみ、マッチングを解除
                if ($remainingItemsCount === 0) {
                    $row->update(['is_matched' => false]);
                }
            }
            // ここまで関連スレッドの状態のアップデート
        });
        

        return redirect()->route('listing')->with('success', '商品を削除しました');
    }
}
