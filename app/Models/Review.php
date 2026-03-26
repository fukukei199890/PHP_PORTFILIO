<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'reviewed_user_id',
        'reviewing_user_id',
        'score',
        'review_text'
    ];

    public function user()
    {
         return $this->belongsTo(User::class);
    }
    public function reviewingUser() // 評価した人
    {
        // reviewing_user_id を使って User テーブルと紐付ける
        return $this->belongsTo(User::class, 'reviewing_user_id');
    }

    public function reviewedUser() // 評価された人
    {
        // reviewed_user_id を使って User テーブルと紐付ける
        return $this->belongsTo(User::class, 'reviewed_user_id');
    }
}
