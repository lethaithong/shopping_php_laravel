<?php

namespace App\Providers;
use DB;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator; 

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
        view::share('category', DB::table('category')->get());
        view::share('user', DB::table('user')->get());

        view::share('product', DB::table('product')->count());
        view::share('order', DB::table('order')->count());
        view::share('user', DB::table('user')->count());
        view::share('total', DB::table('order')->sum('Total'));

        paginator::useBootstrap();
    }
}
