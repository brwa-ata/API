<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addMinute(30));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::enableImplicitGrant();

        Passport::tokensCan([
            'purchase-product' =>     'Create a new transaction for a specific product' ,
            'manage-product'    =>    'Create, Read, Update, and Delete a products (CRUD)' ,
            'manage-account'    =>    'Read your data, id, name , email,  if verified , and if admin (cannot read password). Modify your data
                                                   (email, and password). Cannot delete your account ' ,
            'read-general'        =>    'Read general information like purchasing categories, purchased product, selling product, selling categories
                                                  your transactions (purchases and sales)' ,
        ]);
    }
}
