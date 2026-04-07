<?php

namespace App\Filament\Resources\Routes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class RouteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Informasi Detail')
                    ->schema([
                        TextEntry::make('routeCategory.name')
                            ->label('Kategori Rute')
                            ->formatStateUsing(fn($state) => strtoupper($state))
                            ->badge()
                            ->label('Route category'),

                        TextEntry::make('name')
                            ->label('Kategori Rute'),

                        TextEntry::make('fee')
                            ->label('Upah')
                            ->badge()
                            ->color('success')
                            ->numeric(),

                        TextEntry::make('created_at')
                            ->label('Dibuat Pada')
                            ->dateTime()
                            ->placeholder('-'),

                        TextEntry::make('updated_at')
                            ->label('Tanggal Diubah')
                            ->dateTime()
                            ->placeholder('-'),

                    ])
                    ->columns(3)
                    ->columnSpanFull()
            ]);
    }
}
