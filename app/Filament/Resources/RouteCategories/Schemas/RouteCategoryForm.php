<?php

namespace App\Filament\Resources\RouteCategories\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RouteCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                DatePicker::make('valid_from')
                    ->required(),
                DatePicker::make('valid_until')
                    ->required(),
            ]);
    }
}
