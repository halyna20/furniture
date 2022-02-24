<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $this->menuLoad();
    }

    public function menuLoad() {
        View::composer('layouts.app', function( $view ) {
            $view->with('groups', \App\Models\Group::with('children')->where('parent_id', 0)->where('active', 1)->get());
        });
    }
}
