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
            $Admin= $user->role ==="ADMIN";
            return $Admin;
        });
        Gate::define('isNaeb',function(Administration $user){
            return $user->role ==="NAEB";
        });
        Gate::define('isRab',function(Administration $user){
            return $user->role ==="RAB";
        });

        Gate::define('isDistrictAgro',function(Administration $user){
            return $user->role ==="DISTRICT AGRONOMIST";
        });
        Gate::define('isSectorAgro',function(Administration $user){
            return $user->role ==="SECTOR AGRONOMIST";
        });
        Gate::define('isSedo',function(Administration $user){
            return $user->role ==="SEDO";
        });
        Gate::define('isManager',function(Administration $user){
            return $user->role ==="MANAGER";
        });


    }
}
