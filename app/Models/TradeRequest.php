<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        // 書き込みを許可するカラム
        'status',
        'request_series',
        'request_char',
        'request_message',
        'image_url',
        'is_opened',
        'user_id',
        'listed_item_id'

    ];

    public function listed_item()
    {
        return $this->belongsTo(ListedItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
