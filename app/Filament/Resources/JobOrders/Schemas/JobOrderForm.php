<?php

namespace App\Filament\Resources\JobOrders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class JobOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('job_order_number')
                    ->required(),
                TextInput::make('vehicle_number')
                    ->required(),
                TextInput::make('load_address')
                    ->required(),
                TextInput::make('unload_address')
                    ->required(),
                TextInput::make('distance_km')
                    ->required()
                    ->numeric(),
                TextInput::make('cargo_name')
                    ->required(),
                TextInput::make('load_tonnage')
                    ->required()
                    ->numeric(),
                TextInput::make('unload_tonnage')
                    ->required()
                    ->numeric(),
                TextInput::make('delivery_note_photo')
                    ->required(),
                TextInput::make('unload_note_photo')
                    ->required(),
                Select::make('status')
                    ->options([
            'draft' => 'Draft',
            'on_delivery' => 'On delivery',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
        ])
                    ->required(),
            ]);
    }
}
