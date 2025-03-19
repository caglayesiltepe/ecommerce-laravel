<?php

namespace App\Providers;

use App\Interfaces\RepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\BrandRepository;
use App\Repositories\AttributeValueRepository;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\AttributeValueService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class, ProductRepository::class);

        $this->app->when(ProductService::class)
            ->needs(RepositoryInterface::class)
            ->give(ProductRepository::class);

        $this->app->when(CategoryService::class)
            ->needs(RepositoryInterface::class)
            ->give(CategoryRepository::class);

        $this->app->when(BrandService::class)
            ->needs(RepositoryInterface::class)
            ->give(BrandRepository::class);

        $this->app->when(AttributeValueService::class)
            ->needs(RepositoryInterface::class)
            ->give(AttributeValueRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
