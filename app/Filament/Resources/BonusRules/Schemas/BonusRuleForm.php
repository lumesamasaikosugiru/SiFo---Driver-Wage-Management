<?php

namespace App\Filament\Resources\BonusRules\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BonusRuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('type')
                    ->options(['ritase' => 'Ritase', 'distance' => 'Distance'])
                    ->required(),
                TextInput::make('min_value')
                    ->required()
                    ->numeric(),
                TextInput::make('max_value')
                    ->required()
                    ->numeric(),
                TextInput::make('bonus_value')
                    ->required()
                    ->numeric(),
                Select::make('route_category_id')
                    ->relationship('routeCategory', 'name')
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
                DatePicker::make('valid_from'),
                DatePicker::make('valid_until'),
            ]);
    }
}
