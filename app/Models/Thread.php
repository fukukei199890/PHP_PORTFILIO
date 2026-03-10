<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        // 書き込みを許可するカラム
        'sender_id',
        'receiver_id',
        'listed_item_id',
        'is_matched'
    ];

    public function listed_item()
    {
        return $this->belongsTo(ListedItem::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
