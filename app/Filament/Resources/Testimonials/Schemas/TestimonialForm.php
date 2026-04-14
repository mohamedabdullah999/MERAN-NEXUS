<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Client Name / Title')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image_path')
                    ->label('Client Avatar (Optional)')
                    ->image()
                    ->directory('testimonials/avatars')
                    ->avatar(),
                Textarea::make('description')
                    ->label('Review / Testimonial')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                TextInput::make('reference_link')
                    ->label('Reference Link (e.g., LinkedIn Post)')
                    ->url()
                    ->columnSpanFull(),
            ]);
    }
}
