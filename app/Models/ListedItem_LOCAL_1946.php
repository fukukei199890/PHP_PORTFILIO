<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListedItem extends Model
{
    use HasFactory;

    // この出品物に紐付いているアイテムを取得
    // このModelがItemモデルの子要素になっていると宣言している
    // 言い換え）item_idは外部キーで、それはitemsテーブルに存在することを宣言している
    // 具体的には、ListedItemのインスタンスはitemプロパティを通じてItemモデルのインスタンスを利用できるようになる
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
