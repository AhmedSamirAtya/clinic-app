<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            //     Route::middleware('web')
            //     ->group(base_path('routes/web.php'));

            // // Register your new assistants routes here
            // Route::middleware('web') // Or 'assistant' if it's a separate web-based flow
            //     ->group(base_path('routes/assistants.php'));

            Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
                ->prefix(LaravelLocalization::setLocale())
                ->group(base_path('routes/doctors.php'));
            Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
                ->prefix(LaravelLocalization::setLocale())
                ->group(base_path('routes/web.php'));
            Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
                ->prefix(LaravelLocalization::setLocale())
                ->group(base_path('routes/patients.php'));
            Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
                ->prefix(LaravelLocalization::setLocale())
                ->group(base_path('routes/assistants.php'));
        });
    }
}
