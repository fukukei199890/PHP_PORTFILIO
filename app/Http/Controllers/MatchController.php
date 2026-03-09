<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ListedItem;
use App\Models\Item;
use App\Models\Thread;

class MatchController extends Controller
{
    public function index()
    {
        if(Auth::check()){ 
            $item = ListedItem::with('images')->where('user_id',Auth::user()->id)->get(); // urlを返す
            return view('match',compact('item'));
        }else{
            return view('match');
        }
    }

    // public function start_chat(Request $request)
    // {
    //     $chat_data = Thread::create([
    //         'sender_id' = $request->name,
    //         'receiver_id' = Auth::user()->id,
    //         'listed_item_id' ,
    //         'is_matched' = false
    //     ]);
    //     return view('message-select')
    // }
}
