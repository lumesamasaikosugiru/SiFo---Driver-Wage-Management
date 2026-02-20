<?php

namespace App\Filament\Resources\Ritases\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RitaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('driver_id')
                    ->relationship('driver', 'id')
                    ->default(null),
                Select::make('route_id')
                    ->relationship('route', 'name')
                    ->required(),
                Select::make('job_order_id')
                    ->relationship('jobOrder', 'id')
                    ->required(),
                DatePicker::make('date')
                    ->required(),
                TextInput::make('total_tarif')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'dikunci' => 'Dikunci',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->required(),
                TextInput::make('locked_by')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('locked_at'),
            ]);
    }
}
