<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Review;

use Illuminate\Support\Facades\Storage; // これを追記

class MypageController extends Controller
{
    //
    public function index()
    {
        // レビュースコア
        $score = 0;
        $count = 0;
        $total = 0;
        $reviews = null;

        $reviews = Review::where('reviewed_user_id', Auth::user()->id)->get();
            foreach ($reviews as $row) {
                $count++;
                $total += $row->score;
            }
            if ($count>0) {
                $score = $total / $count;
            } else {
                $score = 0;
            }

        return view('mypage', compact('score'));
    }

    public function updateIcon(Request $request)
{
    $request->validate([
        'icon' => 'required|image|max:2048',
    ]);

    $user = Auth::user();

    if ($request->hasFile('icon')) {
        // 画像を public ディスクの icons フォルダに保存
        $path = $request->file('icon')->store('icons', 'public');

        // モデルの 'icon_url' カラムに保存
        // Storage::url($path) で "/storage/icons/xxx.jpg" という文字列が入ります
        $user->icon_url = Storage::url($path);
        $user->save();
    }

    return back()->with('status', 'アイコンを更新しました！');
}
}
