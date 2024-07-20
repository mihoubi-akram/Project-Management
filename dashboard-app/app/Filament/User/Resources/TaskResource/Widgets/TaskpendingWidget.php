<?php

namespace App\Filament\User\Resources\TaskResource\Widgets;

use App\Models\Task;
use Faker\Core\Color;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TaskpendingWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Tasks', Task::where('status', 'pending')->count())
            ->description('Pending')
            ->color('danger')
        ];
    }

    protected int | string | array $columnSpan = '3';
    protected function getColumns(): int
    {
        return 6;
    }
}
