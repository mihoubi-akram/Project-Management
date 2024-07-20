<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;

class LastUsersWidget extends Widget
{
    protected static string $view = 'filament.widgets.last-users-widget';

    protected function getViewData(): array
    {
        return [
            'users' => User::latest()->take(10)->get(),
        ];
    }
}
