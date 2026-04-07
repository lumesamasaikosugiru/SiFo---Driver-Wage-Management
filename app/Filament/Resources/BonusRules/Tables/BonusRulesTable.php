<?php

namespace App\Filament\Resources\BonusRules\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BonusRulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Bonus')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Tipe')
                    ->formatStateUsing(fn($state) => strtoupper($state))
                    ->color(fn($state) => match ($state) {
                        'ritase' => Color::Green,
                        'distance' => Color::Teal,
                    })
                    ->badge(),
                TextColumn::make('min_value')
                    ->label('Min Value')
                    ->tooltip('Nilai minimal untuk mendapatkan bonus')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_value')
                    ->label('Max Value')
                    ->tooltip('Nilai Maxsimal')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('bonus_value')
                    ->label('Nilai Bonus')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('routeCategory.name')
                    ->label('Kategori Rute')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Rute Aktif')
                    ->boolean(),
                TextColumn::make('valid_from')
                    ->label('Tanggal Valid')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('valid_until')
                    ->label('Valid Hingga')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
