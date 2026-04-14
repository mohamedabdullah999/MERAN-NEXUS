<?php

namespace App\Filament\Resources\Impacts\Pages;

use App\Filament\Resources\Impacts\ImpactResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditImpact extends EditRecord
{
    protected static string $resource = ImpactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
