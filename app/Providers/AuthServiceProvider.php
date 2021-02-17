<?php

namespace App\Providers;

use App\models\Banner;
use App\models\Student;
use App\Policies\BannerPolicy;
use App\Policies\StudentDashboardPolicy;
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
//        'App\Model' => 'App\Policies\ModelPolicy',
        'App\models\Banner' => 'App\Policies\BannerPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Implicitly grant "Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
//        Gate::before(function ($user) {
//            return $user->isAdmin() ? true : null;
//        });
    }
}
