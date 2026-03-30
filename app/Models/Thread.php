<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        // 書き込みを許可するカラム
        'sender_id',
        'receiver_id',
        'listed_item_id', //不要なので後で消す
        'is_matched'
    ];

    public function listed_items()
    {
        return $this->belongsToMany(ListedItem::class); //多対多の関係に変更
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function participants()
    {
        return Auth::user()->id  === $this->sender_id ? $this->receiver_id : $this->sender_id;
    }
}
