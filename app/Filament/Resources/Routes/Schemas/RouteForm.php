<?php

namespace App\Filament\Resources\Routes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RouteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('route_category_id')
                    ->relationship('routeCategory', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('fee')
                    ->required()
                    ->numeric(),
            ]);
    }
}
