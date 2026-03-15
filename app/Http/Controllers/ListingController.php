<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class ListingController extends Controller
{
    //
    public function index()
    {
        // ログインユーザーの出品物を、画像リレーションと一緒に取得
        $items = auth()->user()->listed_items()
            ->with('images') // 1つの出品に対して複数の画像がある場合
            ->latest()
            ->get();

        return view('listing', compact('items'));
    }
}
