<?php

namespace App\Filament\User\Resources\TaskResource\Widgets;

use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TaskdeletedWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Task', Task::where('status', 'completed')->count())
            ->description('Completed')
            ->color('success')
        ];
    }

    protected int | string | array $columnSpan = '3';
    protected function getColumns(): int
    {
        return 6;
    }
}
