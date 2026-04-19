<?php

namespace App\Filament\Resources\Testimonials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')->label('Avatar')->circular(),
                TextColumn::make('name_en')->label('Client Name (English)')->searchable()->weight('bold'),
                TextColumn::make('description_en')->label('Review (English)')->limit(50),
                TextColumn::make('reference_link')
                    ->label('Reference Link')
                    ->url(fn ($record) => $record->reference_link)
                    ->openUrlInNewTab()
                    ->limit(20),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
