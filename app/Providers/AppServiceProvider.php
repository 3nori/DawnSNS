<?php

namespace App\Providers;

use App\Follow;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view)
        {
            $view->with('followCount', Follow::where('follower', auth()->id())->count());
            $view->with('followerCount', Follow::where('follow', auth()->id())->count());
        });
    }
}
