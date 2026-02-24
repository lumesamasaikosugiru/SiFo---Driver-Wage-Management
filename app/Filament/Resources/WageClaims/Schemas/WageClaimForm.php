<?php

namespace App\Filament\Resources\WageClaims\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WageClaimForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('driver_id')
                    ->relationship('driver', 'id')
                    ->required(),
                DatePicker::make('period_start')
                    ->required(),
                DatePicker::make('period_end')
                    ->required(),
                TextInput::make('period_key')
                    ->required(),
                TextInput::make('total_ritase')
                    ->required()
                    ->numeric(),
                TextInput::make('total_tarif')
                    ->required()
                    ->numeric(),
                TextInput::make('total_bonus')
                    ->required()
                    ->numeric(),
                TextInput::make('total_deduction')
                    ->required()
                    ->numeric(),
                TextInput::make('total_fee')
                    ->required()
                    ->numeric(),
                TextInput::make('total_net_salary')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'submitted' => 'Submitted',
                        'approved_supervisor' => 'Approved supervisor',
                        'approved_finance' => 'Approved finance',
                        'rejected' => 'Rejected',
                        'paid' => 'Paid',
                    ])
                    ->required(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('locked_at'),
            ]);
    }
}
