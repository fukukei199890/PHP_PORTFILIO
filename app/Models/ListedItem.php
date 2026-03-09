<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListedItem extends Model
{
    use HasFactory;

<<<<<<< HEAD
    // この出品物に紐付いているアイテムを取得
    // このModelがItemモデルの子要素になっていると宣言している
    // 言い換え）item_idは外部キーで、それはitemsテーブルに存在することを宣言している
    // 具体的には、ListedItemのインスタンスはitemプロパティを通じてItemモデルのインスタンスを利用できるようになる
    public function item()
=======
    protected $fillable = [
        // 書き込みを許可するカラム
        'user_id',
        'series_name',
        'char_name',
        'is_opend',
        'exchange_area',
        'is_trading'
    ];
<<<<<<< HEAD

    public function user()
    {
        return $this->belongsTo(User::class);
=======
    //リレーションに紐づける
    public function images()
>>>>>>> origin/no21-update-fukuda-0309
    {
        return $this->hasMany(Image::class);
>>>>>>> origin/no4-create-fukuda-0309
    }
}
