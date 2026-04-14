<?php

namespace App\Filament\Resources\MediaCategories\Pages;

use App\Filament\Resources\MediaCategories\MediaCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMediaCategories extends ListRecords
{
    protected static string $resource = MediaCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
