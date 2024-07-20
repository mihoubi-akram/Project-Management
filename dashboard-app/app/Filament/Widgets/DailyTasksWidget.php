<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class DailyTasksWidget extends BaseWidget
{
    protected static ?string $heading = 'My Daily Tasks';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Task::query()
                ->whereHas('project', function (Builder $query) {
                    $query->where('user_id', auth()->id());
                })
                ->whereDate('created_at', today())
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Task')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('project.name')
                    ->label('Project')
                    ->sortable()
                    ->searchable(),
                BadgeColumn::make('status')
                ->colors([
                    'danger' => 'pending',
                    'success' => 'completed',
                    'primary' => 'in-progress',
                ]),
            ]);
    }
}
