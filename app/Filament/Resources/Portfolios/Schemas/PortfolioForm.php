<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use App\Enums\PortfolioType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Portfolio Name')
                ->required()
                ->maxLength(255),

            Select::make('type')
                ->label('Portfolio Type')
                ->options(PortfolioType::class)
                ->required()
                ->searchable(),

            FileUpload::make('image_path')
                ->label('Project Image')
                ->image()
                ->directory('portfolios')
                ->required()
                ->columnSpanFull(),

            RichEditor::make('description')
                ->label('Project Description')
                ->required()
                ->columnSpanFull(),
        ]);
    }
}
