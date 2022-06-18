<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Customer;
use App\Observers\CustomerObserver;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contract\ICustomer', 
            'App\Repositories\Eloquent\CustomerRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        URL::forceScheme('https');
        
        Customer::observe(CustomerObserver::class);
    }
}
