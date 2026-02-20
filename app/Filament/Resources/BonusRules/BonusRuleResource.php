<?php

namespace App\Filament\Resources\BonusRules;

use App\Filament\Resources\BonusRules\Pages\CreateBonusRule;
use App\Filament\Resources\BonusRules\Pages\EditBonusRule;
use App\Filament\Resources\BonusRules\Pages\ListBonusRules;
use App\Filament\Resources\BonusRules\Pages\ViewBonusRule;
use App\Filament\Resources\BonusRules\Schemas\BonusRuleForm;
use App\Filament\Resources\BonusRules\Schemas\BonusRuleInfolist;
use App\Filament\Resources\BonusRules\Tables\BonusRulesTable;
use App\Models\BonusRule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BonusRuleResource extends Resource
{
    protected static ?string $model = BonusRule::class;

    protected static string|UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Aturan Bonus';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentCurrencyDollar;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BonusRuleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BonusRuleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BonusRulesTable::configure($table);
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
            'index' => ListBonusRules::route('/'),
            'create' => CreateBonusRule::route('/create'),
            'view' => ViewBonusRule::route('/{record}'),
            'edit' => EditBonusRule::route('/{record}/edit'),
        ];
    }
}
