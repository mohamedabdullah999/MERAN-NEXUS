<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_en')
                    ->label('Client Name (English)')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('name_ar')
                    ->label('Client Name (Arabic)')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title_en')
                    ->label('Client Title (English)')
                    ->nullable()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title_ar')
                    ->label('Client Title (Arabic)')
                    ->nullable()
                    ->maxLength(255)
                    ->columnSpanFull(),

                FileUpload::make('image_path')
                    ->label('Client Avatar (Optional)')
                    ->image()
                    ->directory('testimonials/avatars')
                    ->avatar()
                    ->columnSpanFull(),

                RichEditor::make('description_en')
                    ->label('Review (English)')
                    ->required()
                    ->columnSpanFull(),

                RichEditor::make('description_ar')
                    ->label('Review (Arabic)')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('reference_link')
                    ->label('Reference Link (e.g., LinkedIn Post)')
                    ->url()
                    ->columnSpanFull(),
            ]);
    }
}
