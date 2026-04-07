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
            Forms\Components\TextInput::make('icon_url')->label('アイコン'),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            //　一覧画面行の追加
            ->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('名前')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->label('メールアドレス')
                ->searchable(),
            Tables\Columns\ImageColumn::make('icon_url')->label('アイコン')
                ->getStateUsing(function ($record): ?string {
                    if (!$record->icon_url) return null;
                    return asset($record->icon_url);
                })
                ->circular(),

            ])
            // 絞り込み
            ->filters([
                //
            ])
            // ボタン
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            // 一括操作
            ->bulkActions([
                // 選択した行を全て削除
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
