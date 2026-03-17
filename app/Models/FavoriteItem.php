<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteItem extends Model
{
    use HasFactory;

    protected $table = 'favorite_items';

    //許可する項目
    protected $fillable = [
        'user_id',
        'listed_item_id'
    ];

    //リレーション
    public function listedItem()
    {
        return $this->belongsTo(ListedItem::class);
    }
}
