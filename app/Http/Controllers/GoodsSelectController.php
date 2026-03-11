<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ListedItem;

use App\Models\TradeRequest;

class GoodsSelectController extends Controller
{
    //
    public function index()
    {

        return view('goodsselect');
    }

    public function test(Request $request)
    {

        // $data = TradeRequest::create([
        //     'request_series'=> $request->input('series_name'),
        //     'request_char'=> $request -> input('char_name'),
        // ]);

        // $image = Image::create([

        // ]);


        // $char_name = $request->input('char_name');
        // $series_name = $request->input('series_name');
        // $is_opened = $request->input('is_opened');

        // session('キー' => '値') という書き方をします
        // session(['sato_char_name' => $request->input('series_name')]);

        // $result = session('sato_char_name');

        $result = $request;


        //福田
        $item = ListedItem::findOrFail(session('current_item_id'));


        return view('goods', compact('item', 'result'));
    }
}
