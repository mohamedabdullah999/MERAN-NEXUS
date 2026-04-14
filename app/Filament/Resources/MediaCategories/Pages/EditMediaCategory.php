<?php

namespace App\Filament\Resources\MediaCategories\Pages;

use App\Filament\Resources\MediaCategories\MediaCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMediaCategory extends EditRecord
{
    protected static string $resource = MediaCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
