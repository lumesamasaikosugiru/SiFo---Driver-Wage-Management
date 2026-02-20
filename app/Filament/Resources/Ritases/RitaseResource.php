<?php

namespace App\Filament\Resources\Ritases;

use App\Filament\Resources\Ritases\Pages\CreateRitase;
use App\Filament\Resources\Ritases\Pages\EditRitase;
use App\Filament\Resources\Ritases\Pages\ListRitases;
use App\Filament\Resources\Ritases\Pages\ViewRitase;
use App\Filament\Resources\Ritases\Schemas\RitaseForm;
use App\Filament\Resources\Ritases\Schemas\RitaseInfolist;
use App\Filament\Resources\Ritases\Tables\RitasesTable;
use App\Models\Ritase;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RitaseResource extends Resource
{
    protected static ?string $model = Ritase::class;
    protected static string|UnitEnum|null $navigationGroup = 'Expedisi';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Ritase';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentChartBar;

    protected static ?string $recordTitleAttribute = 'driver_id';

    public static function form(Schema $schema): Schema
    {
        return RitaseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RitaseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RitasesTable::configure($table);
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
            'index' => ListRitases::route('/'),
            'create' => CreateRitase::route('/create'),
            'view' => ViewRitase::route('/{record}'),
            'edit' => EditRitase::route('/{record}/edit'),
        ];
    }
}
