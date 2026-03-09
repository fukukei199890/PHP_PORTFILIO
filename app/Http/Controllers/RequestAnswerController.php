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
        // リクエストのid
        $request_id = $request->input('request_id');

        // リクエスト者の名前
        $sender_data = TradeRequest::with('user')->where('id', $request_id)->first();
        $user_name = $sender_data->user->name;

        // リクエスト者のスコア
        $count = 0;
        $reviews = Review::where('reviewed_user_id', $sender_data->user->id)->get();
        foreach ($reviews as $row) {
            $count++;
            $total += $row->score;
        }
        if ($count > 0) {
            $score = $total / $count;
        } else {
            $score = 0;
        }

        // 出品物情報
        $listed_item_data = ModelsListedItem::where('id', $sender_data->listed_item_id)->first();
        $my_series = $listed_item_data->series_name;
        $my_char = $listed_item_data->char_name;

        // リクエスト文
        $request_text = $sender_data->request_message;
        // あなたのアイテム


        return  view(
            'requestanswer',
            compact(
                'user_name',
                'score',
                'my_series',
                'my_char',
                'request_text',
                'request_id'
            )
        );
    }
}
