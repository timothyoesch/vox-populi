<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SupportersCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                label: __('widgets.supporters_count.total.label'),
                value: \App\Models\Supporter::count()
            )
                ->icon('heroicon-o-users')
                ->color('success'),
            Stat::make(
                label: __('widgets.supporters_count.optin_rate.label'),
                value: round(\App\Models\Supporter::where('optin', true)->count() / max(\App\Models\Supporter::count(), 1) * 100, 2) . '%'
            )
                ->description(\App\Models\Supporter::where('optin', true)->count() . ' / ' . \App\Models\Supporter::count())
                ->icon('heroicon-o-check-circle')
                ->color('primary')
        ];
    }
}
