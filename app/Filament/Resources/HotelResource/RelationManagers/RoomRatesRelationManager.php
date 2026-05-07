<?php

namespace App\Filament\Resources\HotelResource\RelationManagers;

use Filament\Forms\Components;
use Filament\Actions\CreateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class RoomRatesRelationManager extends RelationManager
{
    protected static string $relationship = 'roomRates';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Components\TextInput::make('room_type')
                    ->required()
                    ->maxLength(255),
                Components\TextInput::make('currency')
                    ->required()
                    ->maxLength(3)
                    ->default('EUR'),
                Components\TextInput::make('price')
                    ->required()
                    ->numeric(),
                Components\Textarea::make('notes'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room_type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
