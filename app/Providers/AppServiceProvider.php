<?php

namespace App\Providers;

use App\Http\Resources\PharmaciesResource;
use App\Http\Resources\ProductsResource;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ProductsResource::withoutWrapping();
        PharmaciesResource::withoutWrapping();
    }
}
