<?php

namespace App\Http\Controllers;

use App\Models\ListedItem;
use App\Models\FavoriteItem;

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

        $favorite_item = FavoriteItem::with('listedItem.images')
            ->latest()
            ->take(3) // 表示数
            ->get();

        return view('top', compact('items', 'favorite_item'));
    }
}
