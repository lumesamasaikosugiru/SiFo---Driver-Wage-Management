<?php

namespace App\Filament\Resources\Ritases\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RitaseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('driver.id')
                    ->label('Driver')
                    ->placeholder('-'),
                TextEntry::make('route.name')
                    ->label('Route'),
                TextEntry::make('jobOrder.id')
                    ->label('Job order'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('locked_by')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('locked_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
