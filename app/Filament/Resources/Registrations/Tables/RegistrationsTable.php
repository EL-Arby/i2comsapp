<?php

namespace App\Filament\Resources\Registrations\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class RegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('organization')
                    ->searchable(),

                TextColumn::make('workshop.title')
                    ->label('Workshop')
                    ->formatStateUsing(fn ($state, $record) => $record->workshop?->title ?? '—')
                    ->searchable(['title'])
                    ->toggleable(),

                TextColumn::make('registration_type')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('payment_received')
                    ->boolean(),

                TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('payment_proof')
                    ->label('Payment Proof')
                    ->url(fn ($record) => $record->payment_proof ? Storage::url($record->payment_proof) : null)
                    ->openUrlInNewTab(),

                IconColumn::make('is_active')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('payment_received'),
                TernaryFilter::make('is_active'),
                SelectFilter::make('registration_type')
                    ->options([
                        'author' => 'Author',
                        'attendee' => 'Attendee',
                        'workshop' => 'Workshop',
                    ]),
            ])
            ->recordActions([
                Action::make('toggleStatus')
                    ->label(fn (Model $record) => $record->is_active ? 'Deactivate' : 'Activate')
                    ->color(fn (Model $record) => $record->is_active ? 'warning' : 'success')
                    ->icon(fn (Model $record) => $record->is_active ? 'heroicon-m-x-circle' : 'heroicon-m-check-circle')
                    ->action(function (Model $record): void {
                        $record->update(['is_active' => !$record->is_active]);
                    }),

                Action::make('cancel')
                    ->label('Cancel')
                    ->color('danger')
                    ->icon('heroicon-m-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Cancel Registration')
                    ->modalDescription('Are you sure you want to cancel this registration? This action cannot be undone.')
                    ->action(function (Model $record): void {
                        $record->delete();
                    }),

                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('activate')
                        ->label('Activate Selected')
                        ->icon('heroicon-m-check-circle')
                        ->color('success')
                        ->action(fn (Model $record) => $record->update(['is_active' => true]))
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('deactivate')
                        ->label('Deactivate Selected')
                        ->icon('heroicon-m-x-circle')
                        ->color('warning')
                        ->action(fn (Model $record) => $record->update(['is_active' => false]))
                        ->deselectRecordsAfterCompletion(),

                    DeleteBulkAction::make()
                        ->label('Delete Selected'),
                ]),
            ]);
    }
}
