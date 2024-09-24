<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\Contracts\SettingRepository::class, \App\Repositories\Eloquent\SettingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\UserRepository::class, \App\Repositories\Eloquent\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\RoleRepository::class, \App\Repositories\Eloquent\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\PermissionRepository::class, \App\Repositories\Eloquent\PermissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ChartRepository::class, \App\Repositories\Eloquent\ChartRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\FaqRepository::class, \App\Repositories\Eloquent\FaqRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\TypeRepository::class, \App\Repositories\Eloquent\TypeRepositoryEloquent::class);
        //:end-bindings:
    }
}
