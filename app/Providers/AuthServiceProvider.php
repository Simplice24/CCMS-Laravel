<?php

namespace App\Providers;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Administration;
use Illuminate\Contracts\Auth\Access\Authorizable;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        Gate::define('isAdmin',function(Administration $user){
            $Admin= $user->role ==="admin";
            return $Admin;
        });
        Gate::define('isNaeb',function(Administration $user){
            return $user->role ==="naeb";
        });
        Gate::define('isRab',function(Administration $user){
            return $user->role ==="rab";
        });

        Gate::define('isDistrictAgro',function(Administration $user){
            return $user->role ==="district_agro";
        });
        Gate::define('isSectorAgro',function(Administration $user){
            return $user->role ==="sector_agro";
        });
        Gate::define('isSedo',function(Administration $user){
            return $user->role ==="sedo";
        });
        Gate::define('isManager',function(Administration $user){
            return $user->role ==="manager";
        });


    }
}
