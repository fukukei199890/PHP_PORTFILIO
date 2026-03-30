<?php

namespace App\Filament\Resources\MassageResource\Pages;

use App\Filament\Resources\MassageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMassage extends EditRecord
{
    protected static string $resource = MassageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
