<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

use App\Models\TradeRequest;
use App\Models\User;
use App\Models\Review;
use App\Models\ListedItem;
use App\Models\Thread;

class RequestAnswerController extends Controller
{
    public function index(Request $request)
    {
        // リクエストのidをセッションに保存
        session(['current_request_id' => $request->input('request_id')]);

        // リクエスト情報objectを作成
        $requestData = TradeRequest::with('listed_item', 'user')
            ->where('id', session('current_request_id'))
            ->first();

            // --- 【追加】ここから通知を既読にする処理 ---
        $notification = Auth::user()->unreadNotifications()
        ->where('data->requestId', session('current_request_id'))
        ->first();

        if ($notification) {
            $notification->markAsRead();
        }
    // --- 【追加】ここまで ---

        // リクエスト者のスコア
        $count = 0;
        $total = 0;
        $reviews = Review::where('reviewed_user_id', $requestData->user_id)->get();

        // SQLのAVG関数を使用
        $score = Review::where('reviewed_user_id', $requestData->user_id)->avg('score') ?? 0;

        

        return  view(
            'requestanswer',
            compact(
                'requestData',
                'score',
            )
        );
    }

    public function make_match(Request $request)
    {
        // リクエストIDをフォーム送信から取得し、フォーム送信からの取得に失敗したらセッションから取得
        $requestId = $request->input('request_id') ?? session('current_request_id');

        if (!$requestId) {
            // $requestIdが存在しないとき
            return redirect()->back()->with('error', 'セッション切れです');
        }

        try {
            // トランザクション開始
            $result = DB::transaction(function () use ($requestId) {
                // リクエストデータを取得
                $requestData = TradeRequest::with('user')->where('id', $requestId)->first();

                // ここから出品物ステータス更新処理
                // リクエストデータから出品物idを取得
                $listedItemData = ListedItem::find($requestData->listed_item_id);

                // 出品物のステータスを交換中にする
                if ($listedItemData) {
                    $listedItemData->is_trading = 1;
                    $listedItemData->save();
                }
                // ここまで出品物ステータス更新処理
                
                // ここからスレッド作成処理
                // 現在の取引関係者のスレッドを作成
                $current_thread = Thread::where('receiver_id',Auth::user()->id)
                ->where('sender_id',$requestData->user_id)
                ->first();

                if($current_thread){
                    // 既にスレッドが存在する場合（過去に取引をしたことがある場合）
                    // threadのlisted_item_idを現在の取引のものに書き換える
                    $current_thread->update([
                        'listed_item_id'=>$requestData->listed_item_id,
                        'is_matched'=>true
                        ]);
                }else{
                    // スレッドが存在しないとき
                    $thread = Thread::create([
                    'sender_id' => $requestData->user_id,
                    'receiver_id' => Auth::user()->id,
                    'listed_item_id' => $requestData->listed_item_id,
                    'is_matched' => true
                    ]);
                    // current_threadを作成
                    $current_thread = Thread::where('receiver_id',Auth::user()->id)
                    ->where('sender_id',$requestData->user_id)
                    ->first();
                }
                // ここまでスレッド作成処理

                // ここからリクエストステータスの書き換え
                $requestData->status = false;
                $requestData->save();
                // ここまでリクエストステータスの書き換え

                // returnは値ひとつしか返せないので連想配列を返す。
                return [
                    'requestData' => $requestData,
                    'current_thread' => $current_thread
                ];
            });
            return view('match', [
                'requestData' => $result['requestData'],
                'current_thread' => $result['current_thread']
                ]);
        } catch (\Exception $e) {
            // トランザクション失敗
            report($e);
            return redirect()->back()->with('error', 'マッチング処理中にエラーが発生しました');
        }
    }

    public function delete(Request $request){
        // フォーム送信またはセッションからリクエストidの受け取り
        $request_id = $request->input('request_id') ?? session('current_request_id');

        
        $current_request = TradeRequest::where('id',$request_id)->first();
        $current_request -> delete(); // リクエストDBからリクエストを削除

        return redirect()->route('requestSelect')->with('message','リクエストを拒否しました');
    }
}
