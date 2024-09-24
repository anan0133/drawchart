<?php

namespace App\Providers;

use App\Models\Setting;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::all();
        $settings = $settings->mapWithKeys(function ($item) {
            return [$item['key'] => $item['value']];
        });

        // Get commons data
        View::share('settings', $settings);
       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
