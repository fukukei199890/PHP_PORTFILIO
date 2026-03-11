<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListedItem;
use App\Models\Image;

class SeachController extends Controller
{
    //
    public function index()
    {
        return view('seach');
    }

    public function read(Request $request)
    {
        // ヴァリデーション
        // ヴァリデーションに失敗した場合は自動でback()する
        $validated = $request->validate([
            // 20文字以下に制限
            'search' => 'required|max:20'
            'is_opened' => 'boolean'
        ]);

        $results = ListedItem::with('images')
        ->where('char_name','LIKE','%'. $validated['search'] .'%')
        ->where('is_opend', $validated['is_opened'])
        ->get();

        return view('seach', compact('results'));
    }
}
