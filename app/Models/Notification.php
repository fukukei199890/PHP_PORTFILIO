<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Casts\Attribute;

use App\Models\User;

class Notification extends DatabaseNotification
{
    // UUID（文字列）を主キーとして扱うための設定
    protected $keyType = 'string';
    public $incrementing = false;

    protected function sender(): Attribute
    {
        return Attribute::make(
            get: function() {
                $senderId = $this->data['sender_id'] ?? $this->data['senderId'] ?? null;
                return User::find($senderId);
            }
        );
    }
}
