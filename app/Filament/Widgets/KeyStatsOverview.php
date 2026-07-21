<?php

namespace App\Filament\Widgets;

use App\Models\LicenseKey;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KeyStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Available Keys', LicenseKey::where('status', 'available')->count())
                ->color('success'),

            Stat::make('Sold Keys', LicenseKey::where('status', 'used')->count())
                ->color('gray'),

            Stat::make('Total Orders', Order::count())
                ->color('primary'),
        ];
    }
}
