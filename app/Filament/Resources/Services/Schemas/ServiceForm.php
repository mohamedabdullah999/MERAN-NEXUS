<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_en')
                    ->label('Service Name (English)')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('name_ar')
                    ->label('Service Name (Arabic)')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Toggle::make('is_top')
                    ->label('Show in Top 5 (Home Page)')
                    ->default(false)
                    ->columnSpanFull(),

                RichEditor::make('description_en')
                    ->label('Description (English)')
                    ->required()
                    ->columnSpanFull(),

                RichEditor::make('description_ar')
                    ->label('Description (Arabic)')
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
