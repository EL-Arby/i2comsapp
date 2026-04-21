<?php

namespace App\Filament\Resources\ConferenceMilestones;

use App\Filament\Resources\ConferenceMilestones\Pages\CreateConferenceMilestone;
use App\Filament\Resources\ConferenceMilestones\Pages\EditConferenceMilestone;
use App\Filament\Resources\ConferenceMilestones\Pages\ListConferenceMilestones;
use App\Filament\Resources\ConferenceMilestones\Schemas\ConferenceMilestoneForm;
use App\Filament\Resources\ConferenceMilestones\Tables\ConferenceMilestonesTable;
use App\Models\ConferenceMilestone;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ConferenceMilestoneResource extends Resource
{
    protected static ?string $model = ConferenceMilestone::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ConferenceMilestoneForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConferenceMilestonesTable::configure($table);
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
            'index' => ListConferenceMilestones::route('/'),
            'create' => CreateConferenceMilestone::route('/create'),
            'edit' => EditConferenceMilestone::route('/{record}/edit'),
        ];
    }
}
