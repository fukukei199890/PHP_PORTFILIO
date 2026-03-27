<?php

namespace App\Filament\Resources\ListeditemResource\Pages;

use App\Filament\Resources\ListeditemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListListeditems extends ListRecords
{
    protected static string $resource = ListeditemResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
