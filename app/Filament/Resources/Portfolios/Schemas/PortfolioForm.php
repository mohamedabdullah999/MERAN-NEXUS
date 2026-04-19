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
            TextInput::make('name_en')
                ->label('Portfolio Name (English)')
                ->required()
                ->maxLength(255),

            TextInput::make('name_ar')
                ->label('Portfolio Name (Arabic)')
                ->required()
                ->maxLength(255),

            Select::make('type')
                ->label('Portfolio Type')
                ->options(PortfolioType::class)
                ->required()
                ->searchable()
                ->columnSpanFull(),

            FileUpload::make('image_path')
                ->label('Project Image')
                ->image()
                ->directory('portfolios')
                ->required()
                ->columnSpanFull(),

            RichEditor::make('description_en')
                ->label('Project Description (English)')
                ->required()
                ->columnSpanFull(),

            RichEditor::make('description_ar')
                ->label('Project Description (Arabic)')
                ->required()
                ->columnSpanFull(),
        ]);
    }
}
