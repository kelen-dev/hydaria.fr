<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NavItem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        view()->composer('*', function ($view) {
            $navItems = NavItem::where('visible', true)->orderBy('order')->get();
            $view->with('navItems', $navItems);
        });
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
}
