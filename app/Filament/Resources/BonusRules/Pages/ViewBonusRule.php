<?php

namespace App\Filament\Resources\BonusRules\Pages;

use App\Filament\Resources\BonusRules\BonusRuleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBonusRule extends ViewRecord
{
    protected static string $resource = BonusRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
