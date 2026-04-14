<?php

namespace App\Filament\Resources\Impacts;

use App\Filament\Resources\Impacts\Pages\CreateImpact;
use App\Filament\Resources\Impacts\Pages\EditImpact;
use App\Filament\Resources\Impacts\Pages\ListImpacts;
use App\Filament\Resources\Impacts\Schemas\ImpactForm;
use App\Filament\Resources\Impacts\Tables\ImpactsTable;
use App\Models\Impact;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ImpactResource extends Resource
{
    protected static ?string $model = Impact::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return ImpactForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ImpactsTable::configure($table);
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
            'index' => ListImpacts::route('/'),
            'create' => CreateImpact::route('/create'),
            'edit' => EditImpact::route('/{record}/edit'),
        ];
    }
}
