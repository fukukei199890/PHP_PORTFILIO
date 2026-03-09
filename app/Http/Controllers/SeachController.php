<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListedItem;
use App\Models\Item;

// 練習用のコードです
use App\Models\User;
// ここまで

class SeachController extends Controller
{
    //
    public function index()
    {
        // 練習用のコードです
        $test = User::whereIn('id',[2,4,6,8,100])->get();
        // ここまで


        return view('seach', compact('test')); // 第２引数以降は練習用のコードです
    }

    public function read(Request $request)
    {
        $keyword = $request->input('search');

        $itemIds = Item::where('char_name', 'LIKE', "%{$keyword}%")->pluck('id');

        $results = ListedItem::with('item')->whereIn('item_id', $itemIds)->get();

        return view('seach', compact('results'));
    }
}
