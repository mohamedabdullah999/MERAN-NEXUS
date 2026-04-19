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
            TextInput::make('site_name_en')
                ->label('Site Name (English)')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('site_name_ar')
                ->label('Site Name (Arabic)')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('hero_title_en')
                ->label('Hero Title (English)')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('hero_title_ar')
                ->label('Hero Title (Arabic)')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            Textarea::make('hero_brief_en')
                ->label('Hero Brief (English)')
                ->required()
                ->rows(3)
                ->columnSpanFull(),

            Textarea::make('hero_brief_ar')
                ->label('Hero Brief (Arabic)')
                ->required()
                ->rows(3)
                ->columnSpanFull(),

            TextInput::make('contact_email')
                ->label('Contact Email')
                ->email()
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('contact_phone')
                ->label('Contact Phone')
                ->tel()
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            FileUpload::make('hero_image')
                ->image()
                ->directory('settings')
                ->required()
                ->columnSpanFull(),

            FileUpload::make('footer_logo')
                ->image()
                ->directory('settings')
                ->required()
                ->columnSpanFull(),

            Repeater::make('social_links')
                ->schema([
                    TextInput::make('platform')->label('Platform Name (e.g., LinkedIn)')->required(),
                    TextInput::make('url')->label('Profile URL')->url()->required(),
                ])
                ->columns(2)
                ->columnSpanFull()
                ->addActionLabel('Add Social Media Link'),
        ]);
    }
}
