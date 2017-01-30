<?php

namespace MaxBoom\Dashboard;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class DashboardProvider extends ServiceProvider
{
    protected $policies = [
        \MaxBoom\Dashboard\Models\AreaActon::class => \MaxBoom\Dashboard\Policies\AreaActionPolicy::class
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once __DIR__ . '/../vendor/autoload.php';

        $this->publishes([
            __DIR__ . '/../config/dashboard.php' => config_path('dashboard.php')
        ], 'config');

        $this->loadRoutesFrom(__DIR__ . '/../routes/dashboard.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations/');

        $this->registerPolicies();

        \Config::set(
            'auth.providers.users.model', 
            config('dashboard.user_model_class')
            //\MaxBoom\Dashboard\Models\Area::class
        );

        //$this->app['App\User']->setModel(new \MaxBoom\Dashboard\Models\Area());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/dashboard.php', 'dashboard'
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                \MaxBoom\Dashboard\Console\Commands\Install::class
            ]);
        }
    }
}
