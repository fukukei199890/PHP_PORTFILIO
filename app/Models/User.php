<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Filament\Models\Contracts\FilamentUser; // 追加
use Filament\Panel;


class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'icon_url'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listed_items()
    {
        return $this->hasMany(ListedItem::class);
    }

    // tradeRequestと1対1関係で自分が親側
    public function tradeRequest(): HasOne
    {
        return $this->hasOne(TradeRequest::class);
    }

    public function notifications()
    {
        // morphManyを使用して、自作したNotificationクラスを指定します
        return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'desc');
    }

    public function unreadNotifications()
    {
        return $this->notifications()->whereNull('read_at');
    }

    /**
     * Filament管理画面へのアクセス権限を定義
     */
    public function canAccessFilament(): bool
    {

        // 2. アクセスを許可するチームメンバーのメールアドレスを配列に入れる
        $adminEmails = [
            'futianqijie560@gmail.com',
            'tarochiku2002@icloud.com',
            'cupsuleLink@proton.me',
        ];

        // ログイン中のメールアドレスを小文字にして比較
        return in_array(strtolower($this->email), $adminEmails);
    }
}
