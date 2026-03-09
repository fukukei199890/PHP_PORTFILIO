<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListedItem;
//追記福田
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        return view('post');
    }


    public function store(Request $request)
    {

        DB::transaction(function () use ($request) {
            // listed_itemsにデータを作成する
            $register = ListedItem::create([
                'user_id' => Auth::id(),
                'series_name' => $request->series_name,
                'char_name' => $request->char_name,
                'is_opened' => $request->is_opened,
                'exchange_area' => $request->exchange_area,
                'is_trading' => $request->integer('is_trading')
            ]);

            // 画像保存処理
            //追記福田

            $firstImage = null;

            //画像保存
            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {

                    if ($image) {

                        $path = $image->store('posts', 'public');

                        Image::create([
                            'listed_item_id' => $register->id,
                            'image_url' => $path
                        ]);

                        //1枚目だけ保存
                        if (!$firstImage) {
                            $firstImage = $path;
                        }
                    }
                }
            }

            //佐藤
            // return view('wait');

            //福田waitページにシリーズ名とキャラ名を表示
            return redirect()->route('wait')->with([
                'series_name' => $register->series_name,
                'char_name' => $register->char_name,
                'image' => $firstImage

            ]);
        });

        return redirect()->route('wait');
    }

    //
}
