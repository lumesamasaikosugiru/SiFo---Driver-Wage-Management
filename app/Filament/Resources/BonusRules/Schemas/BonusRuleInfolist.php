<?php

namespace App\Filament\Resources\BonusRules\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BonusRuleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('type')
                    ->badge(),
                TextEntry::make('min_value')
                    ->numeric(),
                TextEntry::make('max_value')
                    ->numeric(),
                TextEntry::make('bonus_value')
                    ->numeric(),
                TextEntry::make('route_category')
                    ->numeric()
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('valid_from')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('valid_until')
                    ->date()
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
