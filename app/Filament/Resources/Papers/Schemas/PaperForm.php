<?php

namespace App\Filament\Resources\Papers\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaperForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique('papers', 'slug'),

                Textarea::make('abstract')
                    ->columnSpanFull(),

                TextInput::make('keywords')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('authors')
                    ->maxLength(255),

                TextInput::make('presenter')
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('paper_file_path')
                    ->maxLength(255),

                Select::make('status')
                    ->options([
                        'submitted' => 'Submitted',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                        'pending' => 'Pending',
                    ])
                    ->default('pending'),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),

                Checkbox::make('is_published')
                    ->default(true),
            ]);
    }
}
