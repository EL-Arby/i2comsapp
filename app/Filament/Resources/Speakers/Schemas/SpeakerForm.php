<?php

namespace App\Filament\Resources\Speakers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SpeakerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                TextInput::make('role_title'),

                // TextInput::make('talk_title')
                //     ->label('Talk Title'),

                Textarea::make('talk_abstract')
                    ->label('Talk Abstract')
                    ->rows(5)
                    ->columnSpanFull(),

                TextInput::make('affiliation'),

                Textarea::make('bio')
                    ->columnSpanFull(),

                // FileUpload::make('photo_url')
                //     ->image()
                //     ->directory('speakers')
                //     ->disk('public')
                //     ->visibility('public')
                //     ->imagePreviewHeight('200')
                //     ->required(),
                FileUpload::make('photo_url')
                    ->image()
                    ->directory('')
                    ->disk('public_images')
                    ->visibility('public')
                    ->imagePreviewHeight('200'),
                    // ->required(),



                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),

                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
