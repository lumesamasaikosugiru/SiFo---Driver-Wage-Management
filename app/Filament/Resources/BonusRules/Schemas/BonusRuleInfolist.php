<?php

namespace App\Filament\Resources\BonusRules\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;

class BonusRuleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Fieldset::make('Informasi Detail')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama Bonus'),
                        TextEntry::make('type')
                            ->label('Tipe')
                            ->formatStateUsing(fn($state) => strtoupper($state))
                            ->color(fn($state) => match ($state) {
                                'ritase' => Color::Green,
                                'distance' => Color::Teal,
                            })
                            ->badge(),
                        TextEntry::make('routeCategory.name')
                            ->label('Kategori Rute')
                            ->placeholder('-'),
                    ])
                    ->columns(1)
                    ->columnSpan(1),

                Fieldset::make('Aturan Nilai Minimal')
                    ->schema([
                        TextEntry::make('min_value')
                            ->label('Min Value')
                            ->tooltip('Nilai minimal untuk mendapatkan bonus')
                            ->numeric(),
                        TextEntry::make('max_value')
                            ->label('Max Value')
                            ->tooltip('Nilai Maxsimal')
                            ->numeric(),
                        TextEntry::make('bonus_value')
                            ->label('Nilai Bonus')
                            ->numeric()
                            ->badge(),
                    ])
                    ->columns(2)
                    ->columnSpan(1),

                Fieldset::make('Dibuat')
                    ->schema([
                        IconEntry::make('is_active')
                            ->label('Rute Aktif')
                            ->boolean(),
                        TextEntry::make('valid_from')
                            ->label('Tanggal Valid')
                            ->date()
                            ->placeholder('-'),
                        TextEntry::make('valid_until')
                            ->label('Valid Hingga')
                            ->date()
                            ->placeholder('-'),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ])
                    ->columns(2)
                    ->columnSpan(1)

            ])
            ->columns(3);
    }
}
