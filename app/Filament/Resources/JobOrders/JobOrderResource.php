<?php

namespace App\Filament\Resources\JobOrders;

use App\Filament\Resources\JobOrders\Pages\CreateJobOrder;
use App\Filament\Resources\JobOrders\Pages\EditJobOrder;
use App\Filament\Resources\JobOrders\Pages\ListJobOrders;
use App\Filament\Resources\JobOrders\Pages\ViewJobOrder;
use App\Filament\Resources\JobOrders\Schemas\JobOrderForm;
use App\Filament\Resources\JobOrders\Schemas\JobOrderInfolist;
use App\Filament\Resources\JobOrders\Tables\JobOrdersTable;
use App\Models\JobOrder;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JobOrderResource extends Resource
{
    protected static ?string $model = JobOrder::class;

    protected static string|UnitEnum|null $navigationGroup = 'Expedisi';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Expedisi';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;

    protected static ?string $recordTitleAttribute = 'cargo_name';

    public static function form(Schema $schema): Schema
    {
        return JobOrderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return JobOrderInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JobOrdersTable::configure($table);
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
            'index' => ListJobOrders::route('/'),
            'create' => CreateJobOrder::route('/create'),
            'view' => ViewJobOrder::route('/{record}'),
            'edit' => EditJobOrder::route('/{record}/edit'),
        ];
    }
}
