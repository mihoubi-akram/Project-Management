<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class UserWidget extends BaseWidget
{
    
    protected function getStats(): array
    {
      // Get the current date and the date 4 weeks ago
      $now = Carbon::now();
      $fourWeeksAgo = $now->copy()->subWeeks(4);

      // Fetch new user counts for the last 4 weeks
      $newUsersByWeek = User::where('created_at', '>=', $fourWeeksAgo)
          ->groupBy(DB::raw('YEARWEEK(created_at)'))
          ->select(DB::raw('YEARWEEK(created_at) as week'), DB::raw('count(*) as count'))
          ->get()
          ->pluck('count', 'week')
          ->toArray();

      // Ensure we have all 4 weeks in the data
      $chartData = [];
      for ($i = 0; $i < 4; $i++) {
          $week = $fourWeeksAgo->copy()->addWeeks($i)->format('oW');
          $chartData[] = $newUsersByWeek[$week] ?? 0;
      }

  

      return [
          Stat::make('New Users', User::where('created_at', '>=', $fourWeeksAgo)->count())
              ->description('New users that have joined in the last month')
              ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
              ->chart($chartData)
              ->color("success")
      ];
    }
}
