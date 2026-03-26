<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('raviewing_user_id')
                    ->label('評価した人')
                    ->relationship('reviewingUser', 'name') // リレーションから名前を選択
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('raviewed_user_id')
                    ->label('評価された人')
                    ->relationship('reviewedUser', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('score')->required()->label('スコア'),
                Forms\Components\TextInput::make('review_text')->required()->label('コメント'),
                // 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // 「reviewingUser（リレーション）」の「name（ユーザー名）」を出す
                Tables\Columns\TextColumn::make('reviewingUser.name')
                    ->label('評価した人')
                    ->searchable(),
                // 「reviewedUser（リレーション）」の「name（ユーザー名）」を出す
                Tables\Columns\TextColumn::make('reviewedUser.name')
                    ->label('評価された人')
                    ->searchable(),
                Tables\Columns\TextColumn::make('score')->label('スコア'),
                Tables\Columns\TextColumn::make('review_text')->label('コメント'),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }    
}
