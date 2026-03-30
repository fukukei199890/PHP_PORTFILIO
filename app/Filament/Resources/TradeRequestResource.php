<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TradeRequestResource\Pages;
use App\Filament\Resources\TradeRequestResource\RelationManagers;
use App\Models\TradeRequest;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TradeRequestResource extends Resource
{
    protected static ?string $model = TradeRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            // Form\Components\TextInput::make('status'), リクエストを受ければ０になる
            Forms\Components\TextInput::make('user.name')->label('リクエスト送信ユーザー'),
            Forms\Components\TextInput::make('listed_item.user.name')->label('リクエスト受信'),
            Forms\Components\TextInput::make('image_url')->label('交換商品'),
            Forms\Components\TextInput::make('request_series')->label('シリーズ名'),
            Forms\Components\TextInput::make('request_char')->label('キャラ名'),
            Forms\Components\TextInput::make('request_message')->label('メッセージ'),
            // Forms\Components\TextInput::make('image_url'),
            Forms\Components\Placeholder::make('is_opend')->label('開封状況')
                ->content(fn ($record): string => $record?->is_opened ? '開封済み' : '未開封'),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('リクエスト送信ユーザー')->searchable(),
                Tables\Columns\ImageColumn::make('image_url')->label('交換商品')
                    ->getStateUsing(function ($record): ?string {
                        if (!$record->image_url) return null;
                        return asset('storage/' . $record->image_url);
                    }),
                Tables\Columns\TextColumn::make('listed_item.user.name')->label('リクエスト受信'),
                Tables\Columns\TextColumn::make('request_series')->label('シリーズ名'),
                Tables\Columns\TextColumn::make('request_char')->label('キャラ名'),
                Tables\Columns\TextColumn::make('is_opend')->label('開封状況')
                    ->formatStateUsing(fn ($state): string => $state ? '開封済み' : '未開封'),
                Tables\Columns\TextColumn::make('request_message')->label('メッセージ'),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListTradeRequests::route('/'),
            'create' => Pages\CreateTradeRequest::route('/create'),
            'edit' => Pages\EditTradeRequest::route('/{record}/edit'),
        ];
    }    
}
