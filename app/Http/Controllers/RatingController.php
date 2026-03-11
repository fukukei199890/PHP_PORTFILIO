<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index($id = 1)
    {
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
                'nullable', // 空でもOK
                'string', // 文字列
                'max:255'
                ]     // コメントは空でもOK、最大255文字
        ]);

        // 2. データベースに保存
        // Review::create は「新しいレコードを作る」という意味
        Review::create([
            'reviewed_user_id' => auth()->id(),      // 評価をした人（自分）のID
            'reviewed_user_id' => $request->id,    // 評価された人（相手）のID
            'score' => $request->rating,   // 星の数
            'review_text' => $request->comment, // コメント
        ]);

        // 3. 完了したら評価送信完了画面にいく
        return redirect()->route('ratingsubmit');
    }
}
