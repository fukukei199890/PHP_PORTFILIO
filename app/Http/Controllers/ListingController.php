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
            ->with('images')
            ->latest()
            ->get();

        return view('listing', compact('items'));
    }
}
