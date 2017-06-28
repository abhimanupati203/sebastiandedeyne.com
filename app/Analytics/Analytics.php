<?php

namespace App\Analytics;

use Carbon\Carbon;

class Analytics
{
    const FROM_DATE = '2016-01-01';

    public function pageViewsPerWeek()
    {
        $from = Carbon::parse(self::FROM_DATE)->startOfWeek()->addWeek();
        $to = Carbon::now()->startOfWeek();
        
        $dates = [];

        do {
            $dates[] = [
                'date' => $from->copy(),
                'views' => rand(1, 5) === 1 ? rand(10, 800) : rand(10, 300),
            ];
        } while($from->addDay()->lt($to));

        $pageViewsPerWeek = collect($dates)->chunk(7)->map(function ($week) {
            return (object) [
                'date' => $week->first()['date'],
                'views' => $week->sum('views'),
            ];
        });

        $maxPageViewsInWeeks = $pageViewsPerWeek->max('views');

        return $pageViewsPerWeek->map(function ($week) use ($maxPageViewsInWeeks) {
            return data_set($week, 'popularity', $week->views / $maxPageViewsInWeeks * 100);
        });
    }
}
