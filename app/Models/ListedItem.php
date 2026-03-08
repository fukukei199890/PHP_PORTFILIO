<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        // 書き込みを許可するカラム
        'user_id',
        'series_name',
        'char_name',
        'is_opend',
        'exchange_area',
        'is_trading'
    ];
}
