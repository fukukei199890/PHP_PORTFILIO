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
        $user_item = ListedItem::where('user_id',Auth::user()->id)->get();

        // もし「純粋なPHPの配列」に変換したい場合は、最後に ->all() をつけます
        $ids_array = $user_item->pluck('id')->all();

        $trade_request = TradeRequest::whereIn("listed_item_id",$ids_array)->get();


        if (isset($trade_request)) {
            // リクエストが存在
            $is_icon = false;
        }else{
            // リクエストが存在しない
            $is_icon = true;
        }

        
        return view('layouts.user',compact('is_icon'));
        // ['is_icon' => $is_icon,B 'aaa' => $aaa]
        // comact('''is_icon', 'aaa')
    }
}
