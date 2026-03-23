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
        // $request->inpiut('')
        $validated = $request->validate([
            // 20文字以下に制限
            'search_char' => 'nullable | max:20',
            'search_series' => 'required | max:50',
            'is_opened' => 'nullable | boolean'
        ]);
            
            $results = ListedItem::with('images')
            ->where('series_name','LIKE','%'. $validated['search_series'] .'%')
            ->when($validated['search_char'], function($query, $seach_char){
                return $query->where('char_name','LIKE','%'. $seach_char .'%');
            })->when(isset($validated['is_opend']), function($query) use ($validated){
                return $query->where('is_opend',$validated['is_opened']);
            })
            ->get();
        

        return view('seach', compact('results'));
    }
}
