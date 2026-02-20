<?php

namespace App\Filament\Resources\WageClaims;

use App\Filament\Resources\WageClaims\Pages\CreateWageClaim;
use App\Filament\Resources\WageClaims\Pages\EditWageClaim;
use App\Filament\Resources\WageClaims\Pages\ListWageClaims;
use App\Filament\Resources\WageClaims\Pages\ViewWageClaim;
use App\Filament\Resources\WageClaims\Schemas\WageClaimForm;
use App\Filament\Resources\WageClaims\Schemas\WageClaimInfolist;
use App\Filament\Resources\WageClaims\Tables\WageClaimsTable;
use App\Models\WageClaim;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WageClaimResource extends Resource
{
    protected static ?string $model = WageClaim::class;

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Upah';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'Hitungan Upah';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentArrowDown;

    protected static ?string $recordTitleAttribute = 'driver_id';
    // WageClaimResource.php
    public static function canCreate(): bool
    {
        return false;
    }


    public static function form(Schema $schema): Schema
    {
        return WageClaimForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WageClaimInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WageClaimsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWageClaims::route('/'),
            'create' => CreateWageClaim::route('/create'),
            'view' => ViewWageClaim::route('/{record}'),
            'edit' => EditWageClaim::route('/{record}/edit'),
        ];
    }
}
