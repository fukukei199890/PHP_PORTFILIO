<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        // 書き込みを許可するカラム
        'status'
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
