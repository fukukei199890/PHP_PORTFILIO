<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListeditemResource\Pages;
use App\Filament\Resources\ListeditemResource\RelationManagers;
use App\Models\ListedItem;
use App\Models\Image;
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
                Forms\Components\TextInput::make('image_url')
                    ->label('出品画像')
                    ->placeholder('画像URLがここに表示されます')
                    ->afterStateHydrated(function ($component, $record) {
                        // 編集画面読み込み時に最初の画像のURLをセットする
                        $component->state($record?->images->first()?->image_url);
                    })
                    ->hint(function ($state) {
                        return $state 
                            ? new \Illuminate\Support\HtmlString("<img src='{$state}' style='height:50px; border-radius:50%;'>") 
                            : null;
                    })
                    ->disabled(),
                Forms\Components\TextInput::make('series_name')->required()->label('シリーズ名'),
                Forms\Components\TextInput::make('char_name')->required()->label('キャラ名'),
                // 'is＿opend', 開封状況
                Forms\Components\Placeholder::make('is_opened_status')->label('開封状況')
                    ->content(fn ($record): string => $record?->is_opened ? '開封済み' : '未開封'),
                // 'exchange_area', 交換場所
                Forms\Components\TextInput::make('exchange_area')->label('交換場所'),
                // 'is_trading', 取引状況
                Forms\Components\TextInput::make('is_trading')->label('取引状況')
                    ->content(fn ($record): string => $record?->is_trading ? '取引中' : '取引終了'),
                // 'request_message', 求める商品
                Forms\Components\TextInput::make('request_message')->lavbel('求める商品'),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('出品者')->searchable(),

                Tables\Columns\ImageColumn::make('image_url') 
                    ->label('出品画像')
                    ->getStateUsing(function ($record) {
                        // 1. リレーション先の最初の画像データからパスを取得
                        $path = $record->images->first()?->image_url; 
                        if (!$path) return null;
                        // 2. public/posts/... にあるなら asset() でフルURLにする
                        return asset('storage/' . $path);
                    })
                    ->size(40),
                Tables\Columns\TextColumn::make('series_name')->label('シリーズ名'),
                Tables\Columns\TextColumn::make('char_name')->label('キャラ名'),
                // 'is＿opend', 開封状況
                Tables\Columns\TextColumn::make('is_opend')->label('開封状況')
                    ->formatStateUsing(fn ($state): string => $state ? '開封済み' : '未開封'),
                // 'exchange_area', 交換場所
                Tables\Columns\TextColumn::make('exchange_area')->label('交換場所'),
                // 'is_trading', 取引状況
                Tables\Columns\TextColumn::make('is_trading')->label('取引状況')
                     ->formatStateUsing(fn ($state): string => $state ? '取引中' : '取引終了'),
                // 'request_message', 求める商品
                Tables\Columns\TextColumn::make('request_message')->label('求める商品'),
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
