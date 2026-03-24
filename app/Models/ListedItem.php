<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ListedItem extends Model
{
    use HasFactory;

    // この出品物に紐付いているアイテムを取得
    // このModelがItemモデルの子要素になっていると宣言している
    // 言い換え）item_idは外部キーで、それはitemsテーブルに存在することを宣言している
    // 具体的には、ListedItemのインスタンスはitemプロパティを通じてItemモデルのインスタンスを利用できるようになる
    // public function item();
    protected $fillable = [
        // 書き込みを許可するカラム
        'user_id',
        'series_name',
        'char_name',
        'is_opend',
        'exchange_area',
        'is_trading',
        'request_message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //リレーションに紐づける
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    //追記福田お気に入り登録をしているかの判定

    public function favoriteItem()
    {
        return $this->hasMany(FavoriteItem::class);
    }
    public function is_favorites_by_auth_user()
    {
        return $this->favoriteItem()->where('user_id', Auth::id())->exists();
    }

    //日本語で表示
    public function getExchangeAreaLabelAttribute()
    {
        $areas = [
            'miyazaki_station' => '宮崎駅',
            'miyako_city'      => '南宮崎駅・宮交シティ',
            'aeon'             => 'イオンモール宮崎',
            'carino'           => 'カリーノ宮崎（旧ダイエー）',
            'other'            => 'その他（チャットで相談）',
        ];

        // DBの値が空、もしくはリストにない場合は「未設定」などを返す
        return $areas[$this->exchange_area] ?? '未設定';
    }
}
