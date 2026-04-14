<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Article Title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                RichEditor::make('description')
                    ->label('Article Content / Description')
                    ->required()
                    ->columnSpanFull(),

                Select::make('media_type')
                    ->label('Media Type')
                    ->options([
                        'image' => 'Image Only',
                        'video' => 'Uploaded Video',
                        'external_link' => 'External Link (YouTube, etc.)',
                    ])
                    ->required()
                    ->live()
                    ->columnSpanFull(),

                FileUpload::make('file_path')
                    ->label(fn (Get $get) => $get('media_type') === 'video' ? 'Upload Video' : 'Upload Image')
                    ->directory('articles/files')
                    ->acceptedFileTypes(fn (Get $get) => $get('media_type') === 'video'
                        ? ['video/mp4', 'video/webm']
                        : ['image/jpeg', 'image/png', 'image/webp']
                    )
                    ->visible(fn (Get $get) => in_array($get('media_type'), ['video', 'image']))
                    ->required(fn (Get $get) => in_array($get('media_type'), ['video', 'image']))
                    ->maxSize(fn (Get $get) => $get('media_type') === 'video' ? 512000 : 10240)
                    ->columnSpanFull(),

                TextInput::make('external_link')
                    ->label('External Link URL')
                    ->url()
                    ->visible(fn (Get $get) => $get('media_type') === 'external_link')
                    ->required(fn (Get $get) => $get('media_type') === 'external_link')
                    ->columnSpanFull(),

                FileUpload::make('cover_image')
                    ->label('Cover Image')
                    ->image()
                    ->directory('articles/covers')
                    ->helperText('Required for Videos and External Links.')
                    ->visible(fn (Get $get) => in_array($get('media_type'), ['video', 'external_link']))
                    ->required(fn (Get $get) => in_array($get('media_type'), ['video', 'external_link']))
                    ->columnSpanFull(),

                Toggle::make('show_on_home')
                    ->label('Show on Home Page')
                    ->default(true),
            ]);
    }
}
