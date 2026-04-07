<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class RequestAccepted extends Notification
{
    use Queueable;
    protected $requestAcceptData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($requestAcceptData)
    {
        $this->requestAcceptData = $requestAcceptData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
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
            ->subject(Lang::get('リクエストが承認されました'))
            ->line(Lang::get('あなたが申請していた交換リクエストが承認されました。'))
            ->line(Lang::get('交換を開始しましょう'))
            ->action(Lang::get('取引メッセージ画面'),route('messageselect'))
            ->line(Lang::get('身に覚えがない時は無視してね'));
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
            'requestId'=>$this->requestAcceptData['requestId'],
            'senderId'=>$this->requestAcceptData['senderId'],
            'receiverId'=>$this->requestAcceptData['receiverId']
        ];
    }
}
