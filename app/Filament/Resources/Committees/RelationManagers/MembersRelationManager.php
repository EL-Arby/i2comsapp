<?php

namespace App\Filament\Resources\Committees\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MembersRelationManager extends RelationManager
{
    protected static string $relationship = 'members';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Full Name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title')
                    ->label('Role/Title')
                    ->placeholder('e.g., Chair, Steering Board chair, Steering Board, Member')
                    ->default('Member')
                    ->maxLength(255)
                    ->helperText('Chair, Steering Board chair, Steering Board, Member, or custom title'),

                Textarea::make('affiliation')
                    ->label('Institutional Affiliation')
                    ->maxLength(500)
                    ->columnSpanFull()
                    ->helperText('University, institution, or organization'),

                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->maxLength(255),

                Textarea::make('bio')
                    ->label('Biography')
                    ->columnSpanFull()
                    ->helperText('Optional: member biography or credentials'),

                TextInput::make('photo_url')
                    ->label('Photo URL')
                    ->url()
                    ->maxLength(255)
                    ->helperText('URL to member photo (optional)'),

                TextInput::make('sort_order')
                    ->label('Display Order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower numbers appear first'),

                Toggle::make('is_published')
                    ->label('Published')
                    ->default(true)
                    ->helperText('Show this member on the website'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Role')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'Chair' => 'success',
                        'Steering Board chair' => 'warning',
                        'Steering Board' => 'info',
                        default => 'gray'
                    }),

                TextColumn::make('affiliation')
                    ->label('Affiliation')
                    ->searchable()
                    ->limit(50),

                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_published')
                    ->label('Published'),

                SelectFilter::make('title')
                    ->label('Role')
                    ->options([
                        'Chair' => 'Chair',
                        'Steering Board chair' => 'Steering Board chair',
                        'Steering Board' => 'Steering Board',
                        'Member' => 'Member',
                    ]),
            ])
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
            ])
            ->defaultSort('sort_order');
    }
}
