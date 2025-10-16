<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        // 👈 REMOVED: Passport::routes() - NOT NEEDED IN LARAVEL 11+

        // Token expiration (optional: 1 year)
        Passport::tokensExpireIn(now()->addYear());
    }
}