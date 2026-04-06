<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'inquire_text',
        'is_resolved'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

} 
