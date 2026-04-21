<?php

namespace App\Filament\Resources\ConferenceTopics;

use App\Filament\Resources\ConferenceTopics\Pages\CreateConferenceTopic;
use App\Filament\Resources\ConferenceTopics\Pages\EditConferenceTopic;
use App\Filament\Resources\ConferenceTopics\Pages\ListConferenceTopics;
use App\Filament\Resources\ConferenceTopics\Schemas\ConferenceTopicForm;
use App\Filament\Resources\ConferenceTopics\Tables\ConferenceTopicsTable;
use App\Models\ConferenceTopic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ConferenceTopicResource extends Resource
{
    protected static ?string $model = ConferenceTopic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ConferenceTopicForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConferenceTopicsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConferenceTopics::route('/'),
            'create' => CreateConferenceTopic::route('/create'),
            'edit' => EditConferenceTopic::route('/{record}/edit'),
        ];
    }
}
