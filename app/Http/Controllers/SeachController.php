<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListedItem;
use App\Models\Item;

class SeachController extends Controller
{
    //
    public function index()
    {
        $test = ['test','test2'];

        return view('seach', compact('test'));
    }

    public function read(Request $request)
    {
        $keyword = $request->input('search');

        $itemIds = Item::where('char_name', 'LIKE', "%{$keyword}%")->pluck('id');

        $results = ListedItem::with('item')->whereIn('item_id', $itemIds)->get();

        return view('seach', compact('results'));
    }
}
