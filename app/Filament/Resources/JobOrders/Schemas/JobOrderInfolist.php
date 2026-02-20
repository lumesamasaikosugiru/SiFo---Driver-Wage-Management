<?php

namespace App\Filament\Resources\JobOrders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class JobOrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('job_order_number'),
                TextEntry::make('vehicle_number'),
                TextEntry::make('load_address'),
                TextEntry::make('unload_address'),
                TextEntry::make('distance_km')
                    ->numeric(),
                TextEntry::make('cargo_name'),
                TextEntry::make('load_tonnage')
                    ->numeric(),
                TextEntry::make('unload_tonnage')
                    ->numeric(),
                TextEntry::make('delivery_note_photo'),
                TextEntry::make('unload_note_photo'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
