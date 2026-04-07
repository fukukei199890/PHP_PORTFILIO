<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class RequestReceived extends Notification
{
    use Queueable;
    public $requestData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request)

    {
        $this->requestData = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // 通知方法
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('あなたの出品したグッズに対して交換リクエストが届きました');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            // この配列が自動的にJSONに変換され
            // notificationテーブルのdataに書き込まれる
            'requestId' => $this->requestData->id,
            'sender_id' => Auth::user()->id,
            'sender_name' => Auth::user()->name
        ];
    }
}
