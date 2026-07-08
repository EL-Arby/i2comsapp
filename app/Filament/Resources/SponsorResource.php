<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorResource\Pages;
use App\Models\Sponsor;
use BackedEnum;
use Filament\Forms\Components;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Components\Textarea::make('description')
                    ->columnSpanFull(),
                Components\TextInput::make('website')
                    ->url()
                    ->maxLength(255),
                Components\TextInput::make('logo_url')
                    ->maxLength(255),
                Components\TextInput::make('contact_email')
                    ->email()
                    ->maxLength(255),
                Components\TextInput::make('contact_person')
                    ->maxLength(255),
                Components\Select::make('level')
                    ->options([
                        'platinum' => '💎 Platinum',
                        'gold' => '🏆 Gold',
                        'silver' => '✨ Silver',
                        'bronze' => '🤝 Bronze',
                        'collaborator' => '🎓 Collaborator',
                    ])
                    ->default('collaborator'),
                Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                Components\Checkbox::make('is_published')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('level')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published'),
                Tables\Filters\SelectFilter::make('level')
                    ->options([
                        'platinum' => '💎 Platinum',
                        'gold' => '🏆 Gold',
                        'silver' => '✨ Silver',
                        'bronze' => '🤝 Bronze',
                        'collaborator' => '🎓 Collaborator',
                    ]),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsor::route('/create'),
            'edit' => Pages\EditSponsor::route('/{record}/edit'),
        ];
    }
}
