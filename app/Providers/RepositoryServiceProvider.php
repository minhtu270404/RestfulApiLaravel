<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {

    }
    public function boot ()
    {
        $this->app->bind(\App\Repositories\v2\UserRepository::class,\App\Repositories\v2\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\v2\UserInfoRepository::class,\App\Repositories\v2\UserInfoRepositoryEloquent::class);
    }
}
