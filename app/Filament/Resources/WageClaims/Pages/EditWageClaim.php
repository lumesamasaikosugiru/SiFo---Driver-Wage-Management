<?php

namespace App\Filament\Resources\WageClaims\Pages;

use App\Filament\Resources\WageClaims\WageClaimResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditWageClaim extends EditRecord
{
    protected static string $resource = WageClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
