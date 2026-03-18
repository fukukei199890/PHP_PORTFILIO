<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;
use App\Models\ListedItem;


class RatingController extends Controller
{
    public function index(Request $request) 
    {
        // thread_idを取得
        $thread_id = $request->input('thread_id')

        // threadsとlisted_itemsをリレーション
        $trads = Thread::with('user')->where('id',$thread_id);

        // 自分のid
        $myId = Auth::id();

        // --- ここで分岐ロジック ---
    if ($thread->seller_id == $myId) {
        // 自分が「出品者」なら、評価する相手は「購入者」
        $receiverId = $thread->buyer_id;
    } else {
        // 自分が「購入者」なら、評価する相手は「出品者」
        $receiverId = $thread->seller_id;
    }

    // 相手のユーザー情報を取得
    $user = User::findOrFail($receiverId);

    return view('rating', [
        'user' => $user,
        'thread_id' => $thread_id
    ]);

        // 送られてきた $id (相手のユーザーID) で検索
        $user = User::findOrFail($id);

        // 取得した相手の情報を 'user' という名前でViewに渡す ['user' => $user]
        return view('rating',['user' => $user]);
    }

    public function store(Request $request)
    {       

        // 1. バリデーション（入力チェック）
        $request->validate([
            'rating' => [
                'required', // 必須入力
                'integer', // 整数
                'min:1',
                'max:5'
                ], // 星は1〜5の間
            'comment' => [
                'required', // 空NG
                'string', // 文字列
                'max:255'
                ]     // コメントは空NG、最大255文字
        
        ]);
        
            // 変数に代入（existsチェック済みなので安心）
            $reviewedUserId = $request->reviewed_user_id;


        // 2. データベースに保存
        // Review::create は「新しいレコードを作る」という意味
        Review::create([
            'reviewing_user_id' => Auth::user()->id,      // 評価をした人（自分）のID
            'reviewed_user_id' => $reviewedUserId,    // 評価された人（相手）のID
            'score' => $request->rating,   // 星の数
            'review_text' => $request->comment, // コメント
        ]);
        
        // 3. 完了したら評価送信完了画面にいく
        // return view('ratingsubmit');]
        return redirect()->route('ratingsubmit');
    }
}
