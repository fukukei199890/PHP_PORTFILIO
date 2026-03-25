<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListedItem;

class ItemCompleteController extends Controller
{
    //
    // CompletedItemController.php（新しく作成する場合）

    public function index()
    {
        // ログインユーザーが過去に出品し、取引完了（ソフトデリート）した商品を取得
        $completedItems = ListedItem::onlyTrashed()
            ->where('user_id', auth()->id())
            ->orderBy('deleted_at', 'desc') // 完了したのが新しい順
            ->paginate(10);

        return view('itemcomplete', compact('completedItems'));
    }
}
