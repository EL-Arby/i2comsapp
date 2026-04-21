<?php

namespace App\Filament\Resources\Registrations\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimeInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->nullable(),

                DateTimeInput::make('registration_date')
                    ->required(),

                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique('registrations', 'email'),

                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),

                TextInput::make('organization')
                    ->maxLength(255),

                TextInput::make('job_title')
                    ->maxLength(255),

                Select::make('registration_type')
                    ->options([
                        'attendee' => 'Attendee',
                        'speaker' => 'Speaker',
                        'organizer' => 'Organizer',
                    ])
                    ->default('attendee'),

                TextInput::make('amount_paid')
                    ->numeric()
                    ->nullable(),

                Checkbox::make('payment_received')
                    ->default(false),

                TextInput::make('payment_method')
                    ->maxLength(255),

                Textarea::make('notes')
                    ->columnSpanFull(),

                Checkbox::make('is_active')
                    ->default(true),
            ]);
    }
}
