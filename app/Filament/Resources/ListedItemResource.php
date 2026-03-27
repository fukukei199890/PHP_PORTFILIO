<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListeditemResource\Pages;
use App\Filament\Resources\ListeditemResource\RelationManagers;
use App\Models\ListedItem;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListeditemResource extends Resource
{
    protected static ?string $model = ListedItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user.name')->required()->label('出品者'),
                Forms\Components\FileUpload::make('image_path') 
                    ->label('商品画像')
                    ->image(), // 画像ファイルのみに制限
                Forms\Components\TextInput::make('series_name')->required()->label('シリーズ名'),
                Forms\Components\TextInput::make('char_name')->required()->label('キャラ名'),
                // 'char_name',　
                // 'is＿opend',
                // 'exchange_area',
                // 'is_trading',
                // 'request_message',
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('出品者')->searchable(),
                // Imagesモデルの画像を表示
                Tables\Columns\ImageColumn::make('images.file_path') // imagesリレーションのfile_pathカラム
                    ->label('画像')
                    ->getStateUsing(fn ($record) => $record
                    ? new \Illuminate\Support\HtmlString("<img src='{$record}' style='width:40px; height:40px; border-radius:50%; object-cover;'>") 
                    : 'No Image'
                    ),
                Tables\Columns\TextColumn::make('series_name')->label('シリーズ名'),
                Tables\Columns\TextColumn::make('char_name')->label('キャラ名'),

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
            'index' => Pages\ListListeditems::route('/'),
            'create' => Pages\CreateListeditem::route('/create'),
            'edit' => Pages\EditListeditem::route('/{record}/edit'),
        ];
    }    
}
