<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('thread_id.user.name')->required()->label('メッセージ送信ユーザー'),
                Forms\Components\TextInput::make('user_id.user.name')->required()->label('メッセージ受信ユーザー'),
                Forms\Components\TextInput::make('message_text')->labal('メッセージ'),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('thread_id.user.name')->label('メッセージ送信ユーザー')->searchable(),
                Tables\Columns\TextColumn::make('user_id.user.name')->label('メッセージ受信ユーザー'),
                Tables\Columns\TextColumn::make('message_text')->label('メッセージ'),
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
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }    
}
