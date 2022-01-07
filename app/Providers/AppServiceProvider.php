<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

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
        Paginator::useBootstrap();

        Gate::define('superadmin', function(User $user){
            return $user->usertype === 'SuperAdmin';
        });

        Gate::define('admin', function(User $user){
            return $user->usertype === 'Admin';
        });

        Gate::define('mix', function(User $user){
            return $user->usertype === 'Admin' || $user->usertype === 'SuperAdmin';
        });

        Gate::define('user', function(User $user){
            return $user->usertype === 'User';
        });

        Schema::defaultStringLength(191);
    }
}
