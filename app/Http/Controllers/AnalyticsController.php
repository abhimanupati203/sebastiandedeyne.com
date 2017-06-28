<?php

namespace App\Http\Controllers;

use App\Analytics\Analytics;
use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class AnalyticsController extends Controller
{
    public function __invoke(ContentRepository $contentRepository, Analytics $analytics)
    {
        $posts = $contentRepository->posts();

        $weeks = $analytics->pageViewsPerWeek()->map(function ($week) use ($posts) {
            return data_set($week, 'posts', $posts->filter(function ($post) use ($week) {
                return $post->date->between($week->date, $week->date->copy()->addDays(6));
            }));
        })->reverse();

        return view('analytics', [
            'weeks' => $weeks,
        ]);
    }
}
