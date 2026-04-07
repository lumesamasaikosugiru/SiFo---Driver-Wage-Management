<?php

namespace App\Filament\Resources\RouteCategories\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class RouteCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Kategori Rute')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Katgori Rute')
                            ->required(),
                        DatePicker::make('valid_from')
                            ->label('Tanggal Valid')
                            ->native(false)
                            ->prefixIcon(Heroicon::CalendarDays)
                            ->required(),
                        DatePicker::make('valid_until')
                            ->label('Valid Hingga')
                            ->native(false)
                            ->prefixIcon(Heroicon::CalendarDays)
                            ->required(),

                    ])
                    ->columns(3)
                    ->columnSpanFull()
            ]);
    }
}
