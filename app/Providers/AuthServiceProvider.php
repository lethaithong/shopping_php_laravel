<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user-role', function ($user) {
            //dd($user);
            if($user->Level === 0 || $user->Level === 1) 
                return true;
            else
                return false;
        });

        Gate::define('user-role-1', function ($user) {
            //dd($user);
            if( $user->Level === 0) 
                return true;
            elseif( $user->Level === 1 )
                return false;
        });

        Gate::define('admin-category', function ($user) {
            //dd($user);
            if( $user->Level === 0) 
                return true;
            elseif( $user->Level === 1 )
                return false;
        });

        Gate::define('admin-product', function ($user) {
            //dd($user);
            if( $user->Level === 0) 
                return true;
            elseif( $user->Level === 1 )
                return false;
        });

        Gate::define('admin-coupon', function ($user) {
            //dd($user);
            if( $user->Level === 0) 
                return true;
            elseif( $user->Level === 1 )
                return false;
        });

    }
}
