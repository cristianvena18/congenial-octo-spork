<?php
declare(strict_types=1);

namespace Infrastructure\Providers;

use Domain\Interfaces\Repositories\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Persistence\Repositories\ProductRepository;

final class DoctrineRepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }
}
