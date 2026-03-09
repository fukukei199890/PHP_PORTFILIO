<?php

namespace App\Http\Controllers;

use App\Models\ListedItem;

use Illuminate\Http\Request;

class TopController extends Controller
{
    //
    public function index()
    {
        $items = ListedItem::with('images')
            ->latest()
            ->take(3) // 表示数
            ->get();

        return view('top', compact('items'));
    }
}
