<?php

namespace App\Filament\Resources\WageClaims\Tables;

use App\Services\WageClaim\GenerateWageClaimService;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WageClaimsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('driver.driver_code')
                    ->label('Driver')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('period_start')
                    ->label('Period Start')
                    ->date()
                    ->sortable(),

                TextColumn::make('period_end')
                    ->label('Period End')
                    ->date()
                    ->sortable(),

                TextColumn::make('period_key')
                    ->label('Period')
                    ->searchable(),

                TextColumn::make('total_ritase')
                    ->label('Ritase')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('total_tarif')
                    ->label('Tarif')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('total_bonus')
                    ->label('Bonus')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('total_deduction')
                    ->label('Deduction')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('total_fee')
                    ->label('Fee')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('net_salary')
                    ->label('Net Salary')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'gray' => 'draft',
                        'warning' => 'generated',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ]),

                TextColumn::make('creator.name')
                    ->label('Created By')
                    ->sortable(),

                TextColumn::make('locked_at')
                    ->label('Locked At')
                    ->dateTime()
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
            ->headerActions([
                Action::make('generate')
                    ->label('Generate Wage Claim')
                    ->icon('heroicon-o-calculator')
                    ->form([
                        Select::make('driver_id')
                            ->relationship('driver', 'driver_code')
                            ->required(),

                        DatePicker::make('period')
                            ->label('Periode')
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        app(GenerateWageClaimService::class)
                            ->generate(
                                $data['driver_id'],
                                Carbon::parse($data['period'])
                            );
                    })
                    ->requiresConfirmation(),
                // ->visible(fn() => auth()->user()->can('generate_wage_claim')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // sengaja dikosongkan
                ]),
            ]);
    }
}
