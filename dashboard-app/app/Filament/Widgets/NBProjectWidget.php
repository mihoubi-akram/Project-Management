<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NBProjectWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', Project::count())
        ];
    }

    protected int | string | array $columnSpan = '3';
    protected function getColumns(): int
    {
        return 6;
    }
}
