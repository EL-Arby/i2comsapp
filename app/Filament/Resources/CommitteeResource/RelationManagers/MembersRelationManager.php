<?php

namespace App\Filament\Resources\CommitteeResource\RelationManagers;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class MembersRelationManager extends RelationManager
{
    protected static string $relationship = 'members';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Section::make('Member Information')
                    ->description('Committee member details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('title')
                            ->label('Role/Title')
                            ->placeholder('e.g., Chair, Steering Board chair, Steering Board, Member')
                            ->default('Member')
                            ->maxLength(255)
                            ->helperText('Chair, Steering Board chair, Steering Board, Member, or custom title'),

                        Forms\Components\Textarea::make('affiliation')
                            ->label('Institutional Affiliation')
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->helperText('University, institution, or organization'),

                        Forms\Components\TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('bio')
                            ->label('Biography')
                            ->columnSpanFull()
                            ->helperText('Optional: member biography or credentials'),

                        Forms\Components\TextInput::make('photo_url')
                            ->label('Photo URL')
                            ->url()
                            ->maxLength(255)
                            ->helperText('URL to member photo (optional)'),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true)
                            ->helperText('Show this member on the website'),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Role')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'Chair' => 'success',
                         'Steering Board chair' => 'warning',
                        'Steering Board' => 'info',
                        default => 'gray'
                    }),

                Tables\Columns\TextColumn::make('affiliation')
                    ->label('Affiliation')
                    ->searchable()
                    ->limit(50),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),

                Tables\Filters\SelectFilter::make('title')
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
