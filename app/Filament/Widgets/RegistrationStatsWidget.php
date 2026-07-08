<?php

namespace App\Filament\Widgets;

use App\Models\Registration;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RegistrationStatsWidget extends StatsOverviewWidget
{
    public function getStats(): array
    {
        $totalRegistrations = Registration::query()->count();
        $paymentsReceived = Registration::query()->where('payment_received', true)->count();
        $totalPaid = Registration::query()->sum('amount_paid') ?? 0;
        $categoryBreakdown = Registration::query()
            ->selectRaw('registration_type, COUNT(*) as total')
            ->whereNotNull('registration_type')
            ->groupBy('registration_type')
            ->orderByDesc('total')
            ->get()
            ->map(fn ($item) => sprintf('%s: %s', $item->registration_type, $item->total))
            ->implode(' • ');

        return [
            Stat::make('Total inscriptions', (string) $totalRegistrations)
                ->description('Inscriptions enregistrées')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make('Paiements reçus', (string) $paymentsReceived)
                ->description('Inscriptions payées')
                ->descriptionIcon('heroicon-m-credit-card')
                ->color('success'),

            Stat::make('Montant total', number_format((float) $totalPaid, 2) . ' €')
                ->description('Somme des montants payés')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('warning'),

            Stat::make('Par catégorie', $categoryBreakdown ?: 'Aucune')
                ->description('Répartition par type d\'inscription')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('gray'),
        ];
    }
}
