<?php

namespace App\Providers;

use App\Repository\ICategoryRepository;
use App\Repository\IEloquentRepository;
use App\Repository\Impl\CategoryRepositoryImpl;
use App\Repository\Impl\EloquetRepositoryImpl;
use App\Repository\Impl\ProductRepositoryImpl;
use App\Repository\IProductRepository;
use App\Services\ICategoryService;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\Impl\ProductServiceImpl;
use App\Services\Impl\RequestResponseServiceImpl;
use App\Services\IProductService;
use App\Services\IRequestResponseService;
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
        $this->app->bind(IEloquentRepository::class, EloquetRepositoryImpl::class);
        $this->app->bind(IProductRepository::class, ProductRepositoryImpl::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepositoryImpl::class);
        $this->app->bind(IRequestResponseService::class, RequestResponseServiceImpl::class);
        $this->app->bind(IProductService::class, ProductServiceImpl::class);
        $this->app->bind(ICategoryService::class, CategoryServiceImpl::class);
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
