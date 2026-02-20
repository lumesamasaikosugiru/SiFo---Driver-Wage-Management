<?php

namespace App\Filament\Resources\WageClaims\Pages;

use App\Filament\Resources\WageClaims\WageClaimResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWageClaims extends ListRecords
{
    protected static string $resource = WageClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
