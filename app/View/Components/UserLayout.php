<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\ListedItem;
use App\Models\TradeRequest;

class UserLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {   

        // $request_count = TradeRequest::whereIn('id')->count();

        if (Auth::check()) {
            // 自分の出品した商品の「IDだけ」を配列で取得する（pluckを使用！）
            $my_item_ids = ListedItem::where('user_id', Auth::id())->pluck('id');

            // その商品IDたちに対して届いているリクエストを数える
            // whereIn('カラム名', 配列) の形にするのがポイント
            $request_count = TradeRequest::whereIn('listed_item_id', $my_item_ids)
            ->where('status',1)->count();
        }

        return view('layouts.user',compact('request_count'));
        // ['is_icon' => $is_icon,B 'aaa' => $aaa]
        // comact('''is_icon', 'aaa')
    }
}
