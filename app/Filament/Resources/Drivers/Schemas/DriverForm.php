<?php

namespace App\Filament\Resources\Drivers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DriverForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('driver_code')
                    ->required(),
                TextInput::make('no_license')
                    ->required(),
                Select::make('status')
                    ->options(['active' => 'Active', 'nonactive' => 'Nonactive'])
                    ->required(),
            ]);
    }
}
