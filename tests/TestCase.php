<?php

namespace Jumamiller\LaravelQueryOptimizer\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Jumamiller\LaravelQueryOptimizer\LaravelQueryOptimizerServiceProvider as ServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'openai.api_key' => 'test',
        ]);
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');
    }

    public function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    public function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
        ];
    }
}
