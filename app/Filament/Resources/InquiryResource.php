<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InquiryResource\Pages;
use App\Filament\Resources\InquiryResource\RelationManagers;
use App\Models\Inquiry;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InquiryResource extends Resource
{
    protected static ?string $model = Inquiry::class;
    
    protected function getHeaderActions(): array
    {
        return [
            // 元からある削除ボタン
            Actions\DeleteAction::make(),

            // メール返信ボタン
            Actions\Action::make('reply')
                ->label('メールで返信')
                ->color('success')
                // 詳細画面なので $this->record でデータが取れます
                ->url(fn () => "mailto:{$this->record->user?->email}?subject=お問い合わせの件について")
                ->openUrlInNewTab(),
        ];
    }

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('user.name')->required()->label('名前'),
            Forms\Components\TextInput::make('user.email')->label('メールアドレス'),
            Forms\Components\TextInput::make('inquire_text')->label('問い合わせ内容'),
            Forms\Components\Placeholder::make('is_resolved')->label('解決状況')
                    ->content(fn ($record): string => $record?->is_resolved ? '解決済み' : '未解決'),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('名前')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('メールアドレス')
                    ->searchable(),
                Tables\Columns\TextColumn::make('inquire_text')
                    ->label('問い合わせ内容')
                    ->searchable()
                    // 一覧で表示する文字数
                    ->limit(20),
                Tables\Columns\TextColumn::make('is_resolved')->label('解決状況')
                    ->formatStateUsing(fn ($state): string => $state ? '解決済み' : '未解決')
                    ->sortable(),
                //
            ])
            ->filters([
                // 「未解決のみ」をワンクリックで表示するスイッチ
                Tables\Filters\TernaryFilter::make('is_resolved')
                    ->label('解決状況で絞り込み')
                    ->placeholder('すべて表示')
                    ->trueLabel('解決済み')
                    ->falseLabel('未解決'),
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            // 未解決が上にくる（昇順）
            ->defaultSort('is_resolved', 'asc');
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInquiries::route('/'),
            'create' => Pages\CreateInquiry::route('/create'),
            'edit' => Pages\EditInquiry::route('/{record}/edit'),
        ];
    }    
}
