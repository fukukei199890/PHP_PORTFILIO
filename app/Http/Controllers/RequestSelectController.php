<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TradeRequest;

class RequestSelectController extends Controller
{
    public function index()
    {
        // リクエストデータの取得
        $tradeRequests = TradeRequest::with('listed_item', 'user') // TradeRequestをlisted_itemとuserに対してそれぞれリレーション
            ->whereHas('listed_item', function ($query) { // リレーション先のテーブルに対するwhere句
                $query->where('user_id', Auth::id()); //listedItemのuser_idがログインユーザーと等しい
            })
            ->get();

        return view('requestSelect', compact('tradeRequests'));
    }
}