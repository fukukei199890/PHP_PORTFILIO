<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TradeRequest;
use App\Models\User;
use App\Models\Review;
use App\Models\Listeditem;
use App\Models\ListedItem as ModelsListedItem;

class RequestAnswerController extends Controller
{
    public function index(Request $request)
    {
        // リクエストのidをセッションに保存
        session(['current_request_id'=> $request->input('request_id')]);

        // リクエスト情報のテーブルを作成
        $requestData = TradeRequest::with('listed_item','user')
        ->where('id',session('current_request_id'))
        ->first();

        // リクエスト者のスコア
        $count = 0;
        $reviews = Review::where('reviewed_user_id', $requestData->user_id)->get();
        foreach ($reviews as $row) {
            $count++;
            $total += $row->score;
        }
        if ($count > 0) {
            $score = $total / $count;
        } else {
            $score = 0;
        }

        return  view(
            'requestanswer',
            compact(
                'requestData',
                'score',
            )
        );
    }
}
