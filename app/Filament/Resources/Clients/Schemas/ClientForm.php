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
                TextInput::make('name')
                    ->label('Client Name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image_path')
                    ->label('Client Logo')
                    ->image()
                    ->directory('clients')
                    ->required(),
                RichEditor::make('description')
                    ->label('Brief Description')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('show_on_home')
                    ->default(true),
            ]);
    }
}
