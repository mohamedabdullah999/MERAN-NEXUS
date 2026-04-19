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
                TextInput::make('value_en')
                    ->label('Stat Value (EN) (e.g., 100+)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('value_ar')
                    ->label('Stat Value (AR) (e.g., +١٠٠)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('label_en')
                    ->label('Stat Label (EN) (e.g., Happy Clients)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('label_ar')
                    ->label('Stat Label (AR) (e.g., عملاء سعداء)')
                    ->required()
                    ->maxLength(255),

                Toggle::make('show_on_home')
                    ->label('Show on Home Page')
                    ->default(true),
            ]);
    }
}
