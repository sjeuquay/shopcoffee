<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutes();
        // Only load categories on non-admin routes
        if (!request()->is('admin*')) {
            View::composer('client.header', function ($view) {
                $category = Category::take(4)->get();
                $view->with('category', $category);
            });
        }
    }

    /**
     * add Routes
     */
    public function loadRoutes(): void
    {

        Route::prefix('admin')
            ->middleware(['web','admin'])
            ->as('admin.')
            ->group(base_path('routes/admin.php'));

        Route::prefix('api')
            ->middleware('api')
            ->as('api.')
            ->group(base_path('routes/api.php'));
    }
}
