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
}
