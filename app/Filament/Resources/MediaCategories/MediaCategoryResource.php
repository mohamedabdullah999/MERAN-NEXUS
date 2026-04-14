<?php

namespace App\Filament\Resources\MediaCategories;

use App\Filament\Resources\MediaCategories\Pages\CreateMediaCategory;
use App\Filament\Resources\MediaCategories\Pages\EditMediaCategory;
use App\Filament\Resources\MediaCategories\Pages\ListMediaCategories;
use App\Filament\Resources\MediaCategories\Schemas\MediaCategoryForm;
use App\Filament\Resources\MediaCategories\Tables\MediaCategoriesTable;
use App\Models\MediaCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MediaCategoryResource extends Resource
{
    protected static ?string $model = MediaCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return MediaCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MediaCategoriesTable::configure($table);
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
            'index' => ListMediaCategories::route('/'),
            'create' => CreateMediaCategory::route('/create'),
            'edit' => EditMediaCategory::route('/{record}/edit'),
        ];
    }
}
