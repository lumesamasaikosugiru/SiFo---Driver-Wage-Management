<?php

namespace App\Filament\Resources\Ritases\Pages;

use App\Filament\Resources\Ritases\RitaseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRitase extends EditRecord
{
    protected static string $resource = RitaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
