<?php

namespace App\Filament\Resources\Impacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ImpactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('value')
                    ->label('Stat Value (e.g., 100+, 50K)')
                    ->required()
                    ->maxLength(255),
                TextInput::make('label')
                    ->label('Stat Label (e.g., Happy Clients)')
                    ->required()
                    ->maxLength(255),
                Toggle::make('show_on_home')
                    ->label('Show on Home Page')
                    ->default(true),
            ]);
    }
}
