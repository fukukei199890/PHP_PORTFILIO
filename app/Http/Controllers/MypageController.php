<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Review;

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
}
