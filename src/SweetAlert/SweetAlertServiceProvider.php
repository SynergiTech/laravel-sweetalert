<?php

namespace SynergiTech\SweetAlert;

use Illuminate\Support\ServiceProvider;

class SweetAlertServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'SynergiTech\SweetAlert\SessionStore',
            'SynergiTech\SweetAlert\LaravelSessionStore'
        );

        $this->app->singleton('synergitech.sweetalert', function () {
            return $this->app->make('SynergiTech\SweetAlert\SweetAlertNotifier');
        });
    }
}
