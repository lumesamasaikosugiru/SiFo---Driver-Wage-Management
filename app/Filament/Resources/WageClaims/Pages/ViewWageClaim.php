<?php

namespace App\Filament\Resources\WageClaims\Pages;

use App\Filament\Resources\WageClaims\WageClaimResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWageClaim extends ViewRecord
{
    protected static string $resource = WageClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
