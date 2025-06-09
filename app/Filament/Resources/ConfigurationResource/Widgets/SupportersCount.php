<?php

namespace App\Filament\Resources\ConfigurationResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SupportersCount extends BaseWidget
{
    public ?\Illuminate\Database\Eloquent\Model $record = null;
    protected function getStats(): array
    {
        return [
            Stat::make(
                label: __('widgets.supporters_count.total.label'),
                value: $this->record->supporters()->count()
            )
                ->icon('heroicon-o-users')
                ->color('success'),
            Stat::make(
                label: __('widgets.supporters_count.optin_rate.label'),
                value: $this->record->supporters()->where('optin', true)->count() / max($this->record->supporters()->count(), 1) * 100 . '%'
            )
                ->description($this->record->supporters()->where('optin', true)->count() . ' / ' . $this->record->supporters()->count())
                ->icon('heroicon-o-check-circle')
                ->color('primary')
        ];
    }
}
