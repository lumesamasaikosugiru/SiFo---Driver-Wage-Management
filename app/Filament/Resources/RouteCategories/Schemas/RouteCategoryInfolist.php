<?php

namespace App\Filament\Resources\RouteCategories\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class RouteCategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Informasi Detail')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama'),
                        TextEntry::make('valid_from')
                            ->label('Tanggal Valid')
                            ->date(),
                        TextEntry::make('valid_until')
                            ->label('Valid Hingga')
                            ->date(),
                        TextEntry::make('created_at')
                            ->label('Tanggal Dibuat')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->label('Diubah Pada')
                            ->dateTime()
                            ->placeholder('-'),

                    ])->columns(5)
                    ->columnSpan(4)
            ]);
    }
}
