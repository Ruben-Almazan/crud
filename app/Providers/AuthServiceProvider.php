<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Models\Programa;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        //Programa::class => ProgramaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    
        Gate::define('admin-programas', function (User $user) {
            return $user->tipo == 'Administrador';
            //return $user->tipo == 'Cliente';
        });
    }
}
