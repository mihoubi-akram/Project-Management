<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\TaskResource\Pages;
use App\Filament\User\Resources\TaskResource\RelationManagers;
use App\Filament\User\Resources\TaskResource\Widgets\TaskdeletedWidget;
use App\Filament\User\Resources\TaskResource\Widgets\TaskinprogressWidget;
use App\Filament\User\Resources\TaskResource\Widgets\TaskpendingWidget;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Task Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()->schema([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Select::make('project_id')
                        ->relationship('project', 'name')
                        ->required(),
                    Select::make('status')
                        ->options([
                            'pending' => 'Pending',
                            'in-progress' => 'In Progress',
                            'completed' => 'Completed',
                        ])
                        ->required(),
                    Textarea::make('description')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Task')->sortable()->searchable(),
              //  TextColumn::make('description'),
                TextColumn::make('project.name')->label('Project')->sortable()->searchable(),
                BadgeColumn::make('status')
                ->colors([
                    'danger' => 'pending',
                    'success' => 'completed',
                    'primary' => 'in-progress',
                ])->sortable(),
               
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
    public static function getWidgets(): array {
        return [
            TaskinprogressWidget::class,
            TaskdeletedWidget::class,
            TaskpendingWidget::class,
        ];
    }
}
