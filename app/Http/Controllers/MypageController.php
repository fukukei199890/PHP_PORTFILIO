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
        if ($count > 0) {
            $score = $total / $count;
        } else {
            $score = 0;
        }

        return view('mypage', compact('score'));
    }
    public function updateIcon(Request $request)
    {
        // 1. バリデーション（10MBまで許可）
        $request->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $user = Auth::user();

        if ($request->hasFile('icon')) {
            // 2. 古いアイコン画像がある場合、ストレージから削除して整理する
            if ($user->icon_url) {
                // DBに保存されている "/storage/icons/xxx.jpg" からパスを抽出して削除
                $oldFilePath = str_replace('/storage/', '', $user->icon_url);
                Storage::disk('public')->delete($oldFilePath);
            }

            // 3. 新しい画像を保存
            $path = $request->file('icon')->store('icons', 'public');

            // 4. DBを更新
            $user->icon_url = Storage::url($path);
            $user->save();
        }

        return back();
    }
}
