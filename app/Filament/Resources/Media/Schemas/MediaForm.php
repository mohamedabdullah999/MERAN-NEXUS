<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title_en')
                    ->label('Media Title (English)')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title_ar')
                    ->label('Media Title (Arabic)')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Select::make('category_id')
                    ->relationship('category', 'name_en')
                    ->label('Category')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),

                Select::make('type')
                    ->label('Media Type')
                    ->options([
                        'video' => 'Video (Upload)',
                        'image' => 'Image (Upload)',
                        'link' => 'External Link (YouTube, etc.)',
                    ])
                    ->required()
                    ->live()
                    ->columnSpanFull(),

                FileUpload::make('file_path')
                    ->label(fn (Get $get) => $get('type') === 'video' ? 'Upload Video File' : 'Upload Image File')
                    ->directory('media/files')
                    ->acceptedFileTypes(fn (Get $get) => $get('type') === 'video'
                            ? ['video/mp4', 'video/webm', 'video/quicktime']
                            : ['image/jpeg', 'image/png', 'image/webp']
                    )
                    ->rules(fn (Get $get) => [
                        $get('type') === 'video' ? 'mimetypes:video/mp4,video/webm,video/quicktime' : 'image',
                    ])
                    ->maxSize(512000)
                    ->visible(fn (Get $get) => in_array($get('type'), ['video', 'image']))
                    ->required(fn (Get $get) => in_array($get('type'), ['video', 'image']))
                    ->live()
                    ->columnSpanFull(),

                FileUpload::make('cover_image')
                    ->label('Cover Image (Thumbnail)')
                    ->image()
                    ->directory('media/covers')
                    ->helperText('Required for Videos and Links to save user bandwidth.')
                    ->visible(fn (Get $get) => in_array($get('type'), ['video', 'link']))
                    ->required(fn (Get $get) => in_array($get('type'), ['video', 'link']))
                    ->columnSpanFull(),

                TextInput::make('external_link')
                    ->label('External Video Link (e.g., YouTube URL)')
                    ->url()
                    ->visible(fn (Get $get) => $get('type') === 'link')
                    ->required(fn (Get $get) => $get('type') === 'link')
                    ->columnSpanFull(),

                Toggle::make('show_on_home')
                    ->label('Show in Home Page')
                    ->default(false),
            ]);
    }
}
