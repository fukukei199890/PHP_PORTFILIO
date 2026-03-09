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
            return view('layouts.user');
            // ['is_icon' => $is_icon,B 'aaa' => $aaa]
            // comact('''is_icon', 'aaa')
        }
}
