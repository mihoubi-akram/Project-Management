<?php

namespace App\Filament\User\Resources\TaskResource\Pages;

use App\Filament\User\Resources\TaskResource;
use App\Filament\User\Resources\TaskResource\Widgets\TaskdeletedWidget;
use App\Filament\User\Resources\TaskResource\Widgets\TaskinprogressWidget;
use App\Filament\User\Resources\TaskResource\Widgets\TaskpendingWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return[
            TaskinprogressWidget::class,
            TaskdeletedWidget::class,
            TaskpendingWidget::class
        ];
    }

    public function getHeaderWidgetsColumns(): int
    {
        return 12;
    }
}
