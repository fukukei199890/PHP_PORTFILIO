<?php

namespace App\Filament\Resources\InquiryResource\Pages;

use App\Filament\Resources\InquiryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class EditInquiry extends EditRecord
{
    protected static string $resource = InquiryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('sendReply')
                ->label('この画面から返信')
                ->color('primary')
                // クリックした時にポコっと出る入力欄の設定
                ->form([
                    Forms\Components\Textarea::make('message')
                        ->label('返信内容')
                        ->placeholder('ここに返信文を入力してください')
                        ->rows(10)
                        ->required(),
                ])
                // 「送信（Submit）」ボタンを押した時の処理
                ->action(function (array $data) {
                    $recipientEmail = $this->record->user?->email; // 宛先
                    $replyMessage = $data['message']; // 入力された本文

                    // 実際にメールを送信する処理
                    Mail::raw($replyMessage, function ($message) use ($recipientEmail) {
                        $message->to($recipientEmail)
                                ->subject('お問い合わせへの回答');
                    });

                    // データベースの「解決状況」を解決済み（true）に書き換える
                    $this->record->update([
                        'is_resolved' => true,
                    ]);

                    // 完了したら画面に通知を出す（ここから下も今のまま）
                    Notification::make()
                        ->title('メールを送信し、解決済みに更新しました') // メッセージを少し変えると親切です！
                        ->success()
                        ->send();

                    // 完了したら画面に通知を出す
                    Notification::make()
                        ->title('メールを送信しました')
                        ->success()
                        ->send();
                }),
        ];
    }
}
