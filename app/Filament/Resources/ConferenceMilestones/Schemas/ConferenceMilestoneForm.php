<?php

namespace App\Filament\Resources\ConferenceMilestones\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ConferenceMilestoneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                DatePicker::make('milestone_date')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('accent')
                    ->options([
                        'primary' => 'Primary (green)',
                        'secondary' => 'Secondary (blue)',
                        'tertiary' => 'Tertiary (teal)',
                        'highlight' => 'Highlight (conference dates card)',
                    ])
                    ->required()
                    ->default('primary'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
