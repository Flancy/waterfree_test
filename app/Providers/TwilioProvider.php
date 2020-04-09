<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Twilio\Rest\Client;

class TwilioProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('twilio', function() {
            return new Client(env('TWILIO_ACCOUNT_SID', null), env('TWILIO_AUTH_TOKEN', null));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
