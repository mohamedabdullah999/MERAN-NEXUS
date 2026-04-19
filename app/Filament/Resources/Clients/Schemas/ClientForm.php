<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_en')
                    ->label('Client Name (English)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('name_ar')
                    ->label('Client Name (Arabic)')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image_path')
                    ->label('Client Logo')
                    ->image()
                    ->directory('clients')
                    ->required()
                    ->columnSpanFull(),

                RichEditor::make('description_en')
                    ->label('Brief Description (English)')
                    ->required()
                    ->columnSpanFull(),

                RichEditor::make('description_ar')
                    ->label('Brief Description (Arabic)')
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('show_on_home')
                    ->default(true),
            ]);
    }
}
