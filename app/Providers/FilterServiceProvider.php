<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Inquire\Company\Filter;
use App\Inquire\Company\Company;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('company.filter', function ($app) {
            return new Filter();
        });

        $this->app->bind('company.company', function ($app) {
            return new Company();
        });
    }
}
