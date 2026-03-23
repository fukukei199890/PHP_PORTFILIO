<?php

namespace App\Http\Controllers;

use App\Models\ListedItem;
use App\Models\FavoriteItem;

use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

class TopController extends Controller
{
    //
    public function index()
    {
        $items = ListedItem::with('images')
            ->latest()
            ->take(10) // 表示数
            ->get();

        //お気に入りの表示   
        $favorite_item = ListedItem::with('images')
            ->withCount('favoriteItem') // お気に入りテーブルとのリレーション名を指定
            ->orderBy('favorite_item_count', 'desc') // カウントが多い順
            ->take(10)
            ->get();
        return view('top', compact('items', 'favorite_item'));
    }
}
