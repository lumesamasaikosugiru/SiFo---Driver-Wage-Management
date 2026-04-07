<?php

namespace App\Filament\Resources\Routes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RouteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Rute Baru')
                    ->schema([
                        Select::make('route_category_id')
                            ->label('Kategori Rute')
                            ->placeholder('Pilih Kategori')
                            ->preload()
                            ->searchable()
                            ->relationship('routeCategory', 'name')
                            ->required(),
                        TextInput::make('name')
                            ->label('Nama Rute')
                            ->required(),
                        TextInput::make('fee')
                            ->label('Upah')
                            ->prefix('Rp')
                            ->required()
                            ->numeric(),

                    ])
                    ->columns(3)
                    ->columnSpanFull()
            ]);
    }
}
