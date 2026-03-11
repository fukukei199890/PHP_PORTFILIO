<?php

namespace App\Http\Controllers;

use App\Models\ListedItem;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //
    public function index()
    {
        return view('goods');
    }

    public function show($id)
    {
        $item = ListedItem::findOrFail($id);

        session(['current_item_id' => $id]);

        return view('goods', compact('item'));
    }
}
