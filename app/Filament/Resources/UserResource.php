<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('name')->required()->label('名前'),
            Forms\Components\TextInput::make('email')->email()->required()->label('メールアドレス'),
            Forms\Components\TextInput::make('icon_url')
                ->label('アイコン')
                ->nullable() // 空でもOK
                ->placeholder('https://example.com/icon.png') // 何も入っていないときの表示
                // 保存されているURLを使って、その場で画像を表示する
                ->hint(fn ($state) => $state 
                ? new \Illuminate\Support\HtmlString("<img src='{$state}' style='height:50px; border-radius:50%;'>") 
                : null),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('name')->label('名前')->searchable(),
            Tables\Columns\TextColumn::make('email')->label('メールアドレス'),
            Tables\Columns\TextColumn::make('icon_url')
                ->label('アイコン')
                // 中身をHTMLとして表示する設定
                ->formatStateUsing(fn ($state) => $state
                // function($state) {
                //     return $state;
                // } と同じ意味（$stateを受け取ってそのまま返す）
                    ? new \Illuminate\Support\HtmlString("<img src='{$state}' style='width:40px; height:40px; border-radius:50%; object-cover;'>") 
                    : 'No Image'
                ),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
