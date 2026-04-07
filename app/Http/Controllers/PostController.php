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
        // 追加：バリデーション（最大4枚、各2MBまで）
        $request->validate([
            'images' => 'required|array|max:4',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'series_name' => 'required|string|max:255',
            'char_name' => 'required|string|max:255',
        ]);

        // トランザクションの結果を $resultData に格納する
        $resultData = DB::transaction(function () use ($request) {

            // listed_itemsにデータを作成する
            //SQL文になる↓
            $register = ListedItem::create([
                'user_id' => Auth::id(),
                'series_name' => $request->series_name,
                'char_name' => $request->char_name,
                'is_opened' => $request->is_opened,
                'exchange_area' => $request->exchange_area,
                // 'is_trading' => $request->integer('is_trading'),
                'is_trading' => 1,
                'request_message' => $request->request_message
            ]);

            // 画像保存処理
            //追記福田
            $firstImage = null;

            //画像保存
            if ($request->hasFile('images')) {
                // フォーム送信がimagesファイルを持っている 
                foreach ($request->file('images') as $image) {

                    if ($image) {
                        //変数imageが存在 

                        // ストレージに画像を保存
                        //store()は第一引数が保存先ディレクトリ、第2引数保存先ディスク
                        //実行すると、指定した保存先にファイル名を自動生成して保存される
                        //戻り値は保存先のpath /file名
                        $path = $image->store('posts', 'public');

                        //createは引数の連想配列をデータとしてsql分のクエリを作っている 
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

            // 福田：waitページに渡すためのデータを配列として返す
            return [
                'series_name' => $register->series_name,
                'char_name' => $register->char_name,
                'image' => $firstImage
            ];
        });

        // 佐藤
        // return view('wait');

        // 福田：waitページにシリーズ名とキャラ名を表示
        // トランザクションの外でリダイレクトを実行します
        return redirect()->route('wait')->with($resultData);
    }
}
