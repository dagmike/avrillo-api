<?php

namespace App\Quotes;

use Illuminate\Support\ServiceProvider;

class QuotesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('quotes', function ($app) {
            return new QuotesManager($app);
        });
    }
}