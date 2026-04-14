<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('site_name')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('hero_title')
                ->label('Hero Section Title')
                ->required()
                ->maxLength(255),

            Textarea::make('hero_brief')
                ->label('Hero Section Brief')
                ->required()
                ->rows(3)
                ->columnSpanFull(),

            FileUpload::make('hero_image')
                ->image()
                ->directory('settings')
                ->required(),

            FileUpload::make('footer_logo')
                ->image()
                ->directory('settings')
                ->required(),

            Repeater::make('social_links')
                ->schema([
                    TextInput::make('platform')
                        ->label('Platform Name (e.g., LinkedIn, Twitter)')
                        ->required(),
                    TextInput::make('url')
                        ->label('Profile URL')
                        ->url()
                        ->required(),
                ])
                ->columns(2)
                ->columnSpanFull()
                ->addActionLabel('Add Social Media Link'),
        ]);
    }
}
