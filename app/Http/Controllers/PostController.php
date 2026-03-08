<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListedItem;

class PostController extends Controller
{
    public function index()
    {
        return view('post');
    }

    public function store(Request $request)
    {
        // listed_itemsにデータを作成する
        $register = ListedItem::create([
            'user_id' => $request->user_id,
            'series_name' => $request->series_name,
            'char_name' => $request->char_name,
            'is_opened' => $request->is_opened,
            'exchange_area' => $request->exchange_area,
            'is_trading' => $request->integer('is_trading')
        ]);

        return view('wait');
    }

    //
}
