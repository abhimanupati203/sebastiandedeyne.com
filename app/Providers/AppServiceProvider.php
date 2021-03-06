<?php

namespace App\Providers;

use App\Http\ViewComposers\ErrorComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('errors.generic', ErrorComposer::class);
    }
}
