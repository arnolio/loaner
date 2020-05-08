<?php

namespace App\Providers;

use App\Services\AprCalculatorService;
use App\Services\LoanService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $loanAprCalculator = new AprCalculatorService();
        $this->app->bind('App\Services\LoanService', function ($app) use ($loanAprCalculator) {
            return new LoanService($loanAprCalculator);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
