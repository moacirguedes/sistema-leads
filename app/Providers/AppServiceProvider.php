<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    

    public function boot()
    {
        Schema::defaultStringLength(191);

        Gate::define('admin', function(){

            return Auth::guard('admin')->check();
            
        });         
    }




    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

