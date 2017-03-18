<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
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
        App::bind('App\Repositories\StudentRepositoryInterface','App\Repositories\StudentRepository');
    }
}
