<?php

namespace App\Filament\Resources\JobOrders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class JobOrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('job_order_number')
                    ->searchable(),
                TextColumn::make('vehicle_number')
                    ->searchable(),
                TextColumn::make('load_address')
                    ->searchable(),
                TextColumn::make('unload_address')
                    ->searchable(),
                TextColumn::make('distance_km')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cargo_name')
                    ->searchable(),
                TextColumn::make('load_tonnage')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('unload_tonnage')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('delivery_note_photo')
                    ->searchable(),
                TextColumn::make('unload_note_photo')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
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
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
