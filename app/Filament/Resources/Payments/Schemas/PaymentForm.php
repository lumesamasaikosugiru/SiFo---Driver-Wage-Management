<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('wage_claim_id')
                    ->relationship('wageClaim', 'id')
                    ->required(),
                DatePicker::make('date_paid')
                    ->required(),
                Select::make('method')
                    ->options(['cash' => 'Cash', 'transfer' => 'Transfer'])
                    ->required(),
                TextInput::make('proof')
                    ->default(null),
                TextInput::make('paid_by')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
