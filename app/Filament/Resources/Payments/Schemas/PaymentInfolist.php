<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('wageClaim.id')
                    ->label('Wage claim'),
                TextEntry::make('date_paid')
                    ->date(),
                TextEntry::make('method')
                    ->badge(),
                TextEntry::make('proof')
                    ->placeholder('-'),
                TextEntry::make('paid_by')
                    ->numeric()
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
