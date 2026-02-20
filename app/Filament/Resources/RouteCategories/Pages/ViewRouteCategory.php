<?php

namespace App\Filament\Resources\RouteCategories\Pages;

use App\Filament\Resources\RouteCategories\RouteCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRouteCategory extends ViewRecord
{
    protected static string $resource = RouteCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
