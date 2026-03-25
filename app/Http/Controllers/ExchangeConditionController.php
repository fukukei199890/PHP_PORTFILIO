<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Thread;
use App\Models\ListedItem;
use App\Models\TradeRequest;

class ExchangeConditionController extends Controller
{
    //
    public function index(Request $request)
    {
        $thread_id = $request->input('thread_id') ?? session('current_thread_id');
        return view('exchangecondition', compact('thread_id'));
    }

    public function complete(Request $request)
    {
        $thread_id = $request->input('thread_id') ?? session('current_thread_id');
        // ThreadとListedItemのリレーション
        if($thread_id){
            // 変数が存在する  
            $thread = Thread::with('listed_item')->find($thread_id);
            if($thread){
                // スレッドが存在する
                DB::transaction(function () use ($thread_id) {
                    // thread_idが存在する時
                    // 現在の出品物id
                    $listed_item_id = Thread::with('listed_item')->find($thread_id)->listed_item_id;
                    // listed_itemテーブルに対する処理
                    $listed_item = ListedItem::where('id',$listed_item_id)->first();
                    $listed_item->update(['is_trading'=>false]); // is_tradingの書き換え
                    $listed_item->delete(); // フィールドのソフトデリート

                    // 関連リクエストのソフトデリート
                    $trade_requests = TradeRequest::where('listed_item_id',$listed_item_id)->get();
                    foreach($trade_requests as $row){
                        $row->delete();
                    }
                });
            }
            else{
                return redirect()->back()->with('error','指定された取引がみつかりませんでした。');
            }
        }

        return redirect()->route('rating',['thread_id' => $thread_id]);
    }
}
