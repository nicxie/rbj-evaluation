<?php

namespace App\Providers;

use App\Models\Employees;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use User;

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
        //

        View::share('title', 'RBJ Comtrex Admin');

        // View::composer('employees.index', function($view) {
        //     $view->with('employees', Employees::all());
        // });
    }
}
