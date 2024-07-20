<?php

namespace App\Filament\User\Resources\TaskResource\Widgets;

use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TaskinprogressWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Task', Task::where('status', 'in-progress')->count())
            ->description('In-progress')
            ->color('primary')
        ];
    }

    protected int | string | array $columnSpan = '3';
    protected function getColumns(): int
    {
        return 6;
    }
}
