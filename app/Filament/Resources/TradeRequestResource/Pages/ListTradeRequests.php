<?php

namespace App\Filament\Resources\TradeRequestResource\Pages;

use App\Filament\Resources\TradeRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTradeRequests extends ListRecords
{
    protected static string $resource = TradeRequestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
