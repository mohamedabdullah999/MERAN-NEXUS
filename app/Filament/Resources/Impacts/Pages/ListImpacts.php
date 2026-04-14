<?php

namespace App\Filament\Resources\Impacts\Pages;

use App\Filament\Resources\Impacts\ImpactResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListImpacts extends ListRecords
{
    protected static string $resource = ImpactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
