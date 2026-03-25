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
            DB::transaction(function () {
                // thread_idが存在する時
                // listed_itemのis_tradingカラムの値をfalseに更新
                $current_thread = Thread::with('listed_item')->find($thread_id);
                $current_thread->listed_item()->update(['is_trading'=>false]);

                // 関連リクエストの削除
                DB::table('trade_requests')->where('listed_item_id',$current_thread->listed_item_id)->delete();
            });
        }
        else{
            return redirect()->back()->with('error','指定された取引がみつかりませんでした。');
        }

        return redirect()->route('rating',['thread_id' => $thread_id]);
    }
}
