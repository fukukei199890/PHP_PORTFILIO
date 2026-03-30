<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Thread;
use App\Models\ListedItem;
use App\Models\TradeRequest;
use App\Models\Messages;

class ExchangeConditionController extends Controller
{
    //
    public function index(Request $request)
    {
        $thread_id = $request->input('thread_id') ?? session('current_thread_id');
        $listed_item_id = $request->input('listed_item_id');

        return view('exchangecondition', compact('thread_id','listed_item_id'));
    }

    public function complete(Request $request)
    {
        // 1. スレッドIDと、今回「交換完了」にする特定のアイテムIDを取得
        $thread_id = $request->input('thread_id') ?? session('current_thread_id');
        $target_item_id = $request->input('listed_item_id'); // ビューから送信される想定

        if (!$thread_id || !$target_item_id) {
            return redirect()->back()->with('error', '取引情報が不足しています。');
        }

        $thread = Thread::find($thread_id);

        if ($thread) {
            DB::transaction(function () use ($thread, $target_item_id) {
                
                // 2. 指定されたアイテムを取得
                $listed_item = ListedItem::find($target_item_id);

                if ($listed_item) {
                    // 出品物のステータス更新とソフトデリート
                    $listed_item->update(['is_trading' => false]);
                    $listed_item->delete(); // SoftDeletes実行

                    // 3. このアイテムに関連する未処理のリクエストを削除
                    TradeRequest::where('listed_item_id', $target_item_id)->delete();

                    // 4. 【重要】スレッドの継続判定
                    // 今消したアイテム以外に、このスレッドに「まだ生きているアイテム」があるか数える
                    // count() は論理削除(SoftDeletes)されたものを自動で除外します
                    $remainingCount = $thread->listed_items()->count();

                    if ($remainingCount === 0) {
                        // 他に交換対象が一つもなくなったら、マッチングを終了させる
                        $thread->update(['is_matched' => false]);
                    }
                }
            });

            return redirect()->route('rating', ['thread_id' => $thread_id]);
        } else {
            return redirect()->back()->with('error', '指定された取引が見つかりませんでした。');
        }
    }
}
