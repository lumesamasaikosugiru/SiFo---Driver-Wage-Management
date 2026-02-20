<?php

namespace App\Filament\Resources\Ritases\Pages;

use App\Filament\Resources\Ritases\RitaseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRitases extends ListRecords
{
    protected static string $resource = RitaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
