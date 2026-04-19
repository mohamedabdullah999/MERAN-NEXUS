<?php

namespace App\Filament\Resources\Inquiries\Tables;

use App\Enums\InquiryStatus;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class InquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Client')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email address copied'),

                TextColumn::make('request_type')
                    ->label('Request')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Phone number copied'),

                TextColumn::make('message')
                    ->label('Message Payload')
                    ->limit(30)
                    ->tooltip(fn ($record): string => $record->message)
                    ->wrap()
                    ->searchable(),

                SelectColumn::make('status')
                    ->label('Status')
                    ->options(InquiryStatus::class)
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Received At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options(InquiryStatus::class),
            ])
            ->recordActions([
                DeleteAction::make(),
            ]);
    }
}
