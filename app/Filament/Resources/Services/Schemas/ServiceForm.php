<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Service Name')
                    ->required()
                    ->maxLength(255),

                Toggle::make('is_top')
                    ->label('Show in Top 5 (Home Page)')
                    ->default(false),

                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('image_path')
                    ->label('Service Image / Icon')
                    ->image()
                    ->directory('services')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
