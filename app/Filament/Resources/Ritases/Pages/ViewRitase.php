<?php

namespace App\Filament\Resources\Ritases\Pages;

use App\Filament\Resources\Ritases\RitaseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRitase extends ViewRecord
{
    protected static string $resource = RitaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
