<?php

namespace Infrastructure\Providers;

use Application\Services\Products\ProductService;
use Application\Services\Products\ProductServiceInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Cache\Provider\Redis\RedisProvider;
use Infrastructure\Hash\HashManager;
use Infrastructure\Hash\HashManagerInterface;
use Presentation\Http\Validations\Utils\ValidatorService;
use Presentation\Http\Validations\Utils\ValidatorServiceInterface;
use Psr\Cache\CacheItemPoolInterface;
use Redis;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HashManagerInterface::class, HashManager::class);

        $this->app->singleton(Redis::class, function (Application $application) {
            $client = new Redis();

            $config = $application->make('config')->get('database.redis.cache');

            if (! $client->connect($config['host'], (int) $config['port'])) {
                throw new \Exception("Could not connect to Redis at {$config['host']}:{$config['port']}");
            }

            return $client;
        });
        $this->app->bind(CacheItemPoolInterface::class, RedisProvider::class);

        $this->app->bind(ValidatorServiceInterface::class, ValidatorService::class);

        $this->app->bind(ProductServiceInterface::class, ProductService::class);
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
