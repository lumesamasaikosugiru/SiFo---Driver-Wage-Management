<?php

namespace App\Filament\Resources\BonusRules\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class BonusRuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bonus')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Bonus')
                            ->required(),
                        Select::make('type')
                            ->label('Tipe')
                            ->prefixIcon(Heroicon::DocumentCurrencyDollar)
                            ->placeholder('Pilih tipe bonus')
                            ->options(['ritase' => 'Ritase', 'distance' => 'Distance'])
                            ->required(),
                        Select::make('route_category_id')
                            ->label('Kategori Rute')
                            ->placeholder('Pilih Rute')
                            ->prefixIcon(Heroicon::MapPin)
                            ->preload()
                            ->searchable()
                            ->relationship('routeCategory', 'name')
                            ->default(null)
                            ->required(),
                    ])
                    ->columns(3)
                    ->columnSpan(5),

                Section::make('Aturan & Nilai Bonus')
                    ->schema([
                        TextInput::make('min_value')
                            ->label('Min Value')
                            ->required()
                            ->numeric(),
                        TextInput::make('max_value')
                            ->label('Max Value')
                            ->required()
                            ->numeric(),
                        TextInput::make('bonus_value')
                            ->label('Nilai Bonus')
                            ->required()
                            ->numeric(),

                    ])
                    ->columns(3)
                    ->columnSpan(3),

                Section::make('Masa Berlaku')
                    ->schema([
                        DatePicker::make('valid_from')
                            ->default(now())
                            ->native(false)
                            ->prefixIcon(Heroicon::CalendarDays)
                            ->label('Tanggal Valid')
                            ->required(),
                        DatePicker::make('valid_until')
                            ->label('Valid Hingga')
                            ->native(false)
                            ->prefixIcon(Heroicon::CalendarDays)
                            ->required(),
                    ])
                    ->columnSpan(2),

            ])
            ->columns(5);
    }
}
