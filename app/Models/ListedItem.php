<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListedItem extends Model
{
    use HasFactory;

    // この出品物に紐付いているアイテムを取得
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
