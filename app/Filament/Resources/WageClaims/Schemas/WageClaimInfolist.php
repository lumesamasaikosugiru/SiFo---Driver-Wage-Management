<?php

namespace App\Filament\Resources\WageClaims\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WageClaimInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('driver.id')
                    ->label('Driver'),
                TextEntry::make('period_start')
                    ->date(),
                TextEntry::make('period_end')
                    ->date(),
                TextEntry::make('period_key'),
                TextEntry::make('total_ritase')
                    ->numeric(),
                TextEntry::make('total_tarif')
                    ->numeric(),
                TextEntry::make('total_bonus')
                    ->numeric(),
                TextEntry::make('total_deduction')
                    ->numeric(),
                TextEntry::make('total_fee')
                    ->numeric(),
                TextEntry::make('total_net_salary')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_by')
                    ->numeric(),
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
